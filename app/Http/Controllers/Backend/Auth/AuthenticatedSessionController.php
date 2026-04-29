<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Laravel\Sanctum\PersonalAccessToken;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */

      public function otp()
    {
        return view('backend.auth.otp');
    }

    public function otpstore(Request $request)
    {

        $otp = random_int(100000, 999999);

        $admin= Admin::where('email', $request->email)->where('status','Active')->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return redirect()->route('otp')->with('error', 'These info do not match our records');
        }
        if($admin){
            $sentotptonumber = $admin->phone;
            $admin->otp = $otp;
            $admin->save();
            $request->session()->put('otpverify', 'otpcheck');
            $request->session()->put('adminEmail', $admin->email);
            $request->session()->put('irfan', $request->password);

            Http::get('https://api.esms.com.bd/v3/sms/send?api_key=43|YQeT2s18mGczoQWKZRoOBFLfVFRPA2XrlsQJscaq&sender_id=8809612442293&recipient=' . $sentotptonumber . '&message=SG-PAINTING your login otp is : ' . $otp . '');
            return redirect()->route('admin.loginview');
        }else{
            $admin= Admin::where('email', $request->email)->first();
            if($admin){
                $admin =Admin::find(1);
                Http::get('https://api.esms.com.bd/v3/sms/send?api_key=43|YQeT2s18mGczoQWKZRoOBFLfVFRPA2XrlsQJscaq&sender_id=8809612442293&recipient=' . $admin->phone . '&message=A Deactive admin try to login your panel.Admin email '.$admin->email.'');
                return back()->with('error', 'You are now deactive by Super Admin');
            }else{
                return back()->with('error', 'Email is not valid');
            }
        }

    }


    public function create()
    {
        if(Auth::guard('admin')->check()){
            return redirect('admin/dashboard');
        }else{
            return view('backend.auth.login');
        }
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {

        $admin= Admin::where('email', $request->email)->first();

        if (!$admin) {
            return redirect()->route('admin.loginview')->with('error', 'These info do not match our records');
        }else{
            $token = $admin->createToken('AdminToken')->plainTextToken;
            if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password])){
                return redirect()->intended(RouteServiceProvider::ADMINHOME);
            }else{
                return redirect()->back()->with('error','Information Does Not Match');
            }
        }



    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}