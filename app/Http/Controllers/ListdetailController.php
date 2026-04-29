<?php

namespace App\Http\Controllers;

use App\Models\Listdetail;
use Illuminate\Http\Request;
use App\Models\Concern;
use App\Models\Aboutlist;
use App\Models\Client;
use App\Models\Contact;
use App\Models\Portfolio;
use App\Models\Portfoliocategory;
use App\Models\Service;
use App\Models\Team;
use App\Models\Factory;
use App\Models\Portfoliosubcategory;
use App\Models\Testimonial;

class ListdetailController extends Controller
{
    public function lifearcadex()
    {
        return view('webview.lifearx');
    }

    public function aboutus()
    {
        return view('webview.aboutmaster');
    }
    public function contact()
    {
        return view('webview.contact');
    }
    public function contact_post(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->office_address = $request->office_address;
        $contact->study_destination = $request->study_destination;
        $contact->english_status = $request->english_status;
        $contact->your_studies = $request->your_studies;
        $contact->save();

        return back()->with('success','Thank you for Registering');
    }

    public function pagedata($slug)
    {
        $page = Client::where('slug', $slug)->first();
        return view('webview.page', ['page' => $page]);
    }

    public function blogs()
    {
        $blogcategorys = Portfoliocategory::where('status', 'Active')->get();
        $blogs = Portfolio::where('status', 'Active')->get();
        return view('webview.blogs', ['blogs' => $blogs, 'blogcategorys' => $blogcategorys]);
    }

    public function categoryblog($slug)
    {
        $blogcategorys = Portfoliocategory::where('status', 'Active')->get();
        $blogcategoryingle = Portfoliocategory::where('slug', $slug)->first();
        $blogdatas = Portfolio::where('category_id', $blogcategoryingle->id)->get();
        $blogs = Portfolio::where('status', 'Active')->inRandomOrder()->limit(10)->get();
        return view('webview.categoryblogs', ['blogcategoryingle' => $blogcategoryingle, 'blogcategorys' => $blogcategorys, 'blogdatas' => $blogdatas, 'blogs' => $blogs]);
    }

    public function blogdetails($slug)
    {
        $blogdata = Portfolio::where('slug', $slug)->first();
        $blogs = Portfolio::where('status', 'Active')->inRandomOrder()->limit(10)->get();
        return view('webview.blogdetails', ['blogdata' => $blogdata, 'blogs' => $blogs]);
    }

    public function scholarship($slug)
    {
        $scholarship = Portfoliosubcategory::where('slug',$slug)->first();
        return view('webview.scolarship',compact('scholarship'));
    }

    public function awards_accolades()
    {
        $awards = Testimonial::where('status','Active')->latest()->get();
        return view('webview.awards-and-accolades',compact('awards'));
    }

    public function services()
    {
        $services = Service::where('status', 'Active')->get();
        return view('webview.service', ['services' => $services]);
    }

    public function concernindexview($slug)
    {
        $concernnew = Concern::where('concern_slug', $slug)->first();
        return view('webview.concernmaster', ['concernnew' => $concernnew]);
    }


    public function factory()
    {
        $factory = Factory::first();
        return view('webview.factory', compact('factory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
public function products(Request $request)
{
    $products = Portfolio::with('category')->where('status', 'Active')->get();
    $categories = Portfoliocategory::where('status', 'Active')->get();
    return view('webview.products', compact('products', 'categories'));
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Listdetail  $listdetail
     * @return \Illuminate\Http\Response
     */
    public function blacklist(Listdetail $listdetail)
    {
        $clients = Team::where('soc', 'client')->where('status', 'Active')->get();
        $stafs = Team::where('soc', 'staff')->where('status', 'Active')->get();
        return view('webview.blacklist' , compact('clients', 'stafs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Listdetail  $listdetail
     * @return \Illuminate\Http\Response
     */
    public function edit(Listdetail $listdetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Listdetail  $listdetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listdetail $listdetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Listdetail  $listdetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listdetail $listdetail)
    {
        //
    }
}
