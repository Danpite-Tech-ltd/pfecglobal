<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Aboutinfo;
use Illuminate\Http\Request;
use DataTables;

class AboutinfoController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.content.slider.aboutindex');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(empty($request->about_title)){
            return response()->json('error', 200);
        }
        $about =new Aboutinfo();
        $about->about_title =$request->about_title;
        $about->about_text =$request->about_text;
        $aboutimage = $request->file('about_image');
        $name = time() . "_" . $aboutimage->getClientOriginalName();
        $uploadPath = ('public/images/about/');
        $aboutimage->move($uploadPath, $name);
        $aboutimageImgUrl = $uploadPath . $name;
        $about->about_image = $aboutimageImgUrl;

        if($request->about_icon){
            $about_icon = $request->file('about_icon');
            $name = time() . "_" . $about_icon->getClientOriginalName();
            $uploadPath = ('public/images/about/');
            $about_icon->move($uploadPath, $name);
            $about_iconImgUrl = $uploadPath . $name;
            $about->about_icon = $about_iconImgUrl;
        }

        $about->save();
        return response()->json($about, 200);
    }

    public function aboutinfodata()
    {
        $abouts = Aboutinfo::all();
        return Datatables::of($abouts)
            ->addColumn('action', function ($abouts) {
                return '<a href="#" type="button" id="editAboutinfoBtn" data-id="' . $abouts->id . '"   class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editmainAboutinfo" ><i class="bi bi-pencil-square"></i></a>';
            })

            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aboutinfo  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = Aboutinfo::findOrfail($id);
        return response()->json($about, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aboutinfo  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $about = Aboutinfo::findOrfail($id);
        if(empty($request->about_title)){
            return response()->json('error', 200);
        }
        $about->about_title =$request->about_title;
        $about->about_text =$request->about_text;
        if($request->about_image){
            if(isset($about->about_image)){
                unlink($about->about_image);
            }
            $about_image = $request->file('about_image');
            $name = time() . "_" . $about_image->getClientOriginalName();
            $uploadPath = ('public/images/about/');
            $about_image->move($uploadPath, $name);
            $about_imageImgUrl = $uploadPath . $name;
            $about->about_image = $about_imageImgUrl;
        }

        if($request->about_icon){
            if(isset($about->about_icon)){
                unlink($about->about_icon);
            }
            $about_icon = $request->file('about_icon');
            $name = time() . "_" . $about_icon->getClientOriginalName();
            $uploadPath = ('public/images/about/');
            $about_icon->move($uploadPath, $name);
            $about_iconImgUrl = $uploadPath . $name;
            $about->about_icon = $about_iconImgUrl;
        }
        $about->update();
        return response()->json($about, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aboutinfo  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = Aboutinfo::findOrfail($id);
        $about->delete();
        return response()->json('success', 200);
    }

    public function statusupdate(Request $request)
    {
        $about = Aboutinfo::where('id',$request->about_id)->first();
        $about->status=$request->status;
        $about->update();
        return response()->json($about, 200);
    }
}