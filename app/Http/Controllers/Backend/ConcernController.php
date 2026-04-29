<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Concern;
use Illuminate\Http\Request;
use DataTables;

class ConcernController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.content.slider.concernindex');
    }

     public function detailsindex()
    {
        return view('backend.content.slider.concerndetails');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(empty($request->concern_title)){
            return response()->json('error', 200);
        }
        $concern =new Concern();
        $concern->concern_slug =$request->concern_slug;
        $concern->concern_title =$request->concern_title;
        $concern->concern_text =$request->concern_text;
        $concernimage = $request->file('concern_image');
        $name = time() . "_" . $concernimage->getClientOriginalName();
        $uploadPath = ('public/images/concern/');
        $concernimage->move($uploadPath, $name);
        $concernimageImgUrl = $uploadPath . $name;
        $concern->concern_image = $concernimageImgUrl;

        if($request->concern_icon){
            $concern_icon = $request->file('concern_icon');
            $name = time() . "_" . $concern_icon->getClientOriginalName();
            $uploadPath = ('public/images/concern/');
            $concern_icon->move($uploadPath, $name);
            $concern_iconImgUrl = $uploadPath . $name;
            $concern->concern_icon = $concern_iconImgUrl;
        }

        $concern->save();
        return response()->json($concern, 200);
    }

    public function concerninfodata()
    {
        $concerns = Concern::all();
        return Datatables::of($concerns)
            ->addColumn('action', function ($concerns) {
                return '<a href="#" type="button" id="editConcernBtn" data-id="' . $concerns->id . '"   class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editmainConcern" ><i class="bi bi-pencil-square"></i></a>
                 <a href="#" type="button" id="deleteConcernBtn" data-id="' . $concerns->id . '" class="btn btn-danger btn-sm" ><i class="bi bi-archive" ></i></a>';
            })

            ->make(true);
    }

    public function concernlistdetails()
    {
        $concerns = Concern::all();
        return Datatables::of($concerns)
            ->addColumn('action', function ($concerns) {
                return '<a href="concern/' . $concerns->concern_slug . '" class="btn btn-danger btn-sm" ><i class="bi bi-eye" ></i></a>';
            })
            ->make(true);
    }

    public function concerndetails($slug)
    {
        $concern = Concern::where('concern_slug',$slug)->first();
        return view('backend.content.slider.concerndetailinfo',['concern'=>$concern]);
    }

    public function concerndetailsupdate(Request $request)
    {
        $concern = Concern::where('id',$request->concern_list_id)->first();
        $concern->concern_details=$request->concern_details;
        $concern->update();
        return redirect('admin/concerndetails')->with('message','Sister Concern Details Update Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Concern  $concern
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $concern = Concern::findOrfail($id);
        return response()->json($concern, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Concern  $concern
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $concern = Concern::findOrfail($id);
        if(empty($request->concern_title)){
            return response()->json('error', 200);
        }
        $concern->concern_slug =$request->concern_slug;
        $concern->concern_title =$request->concern_title;
        $concern->concern_text =$request->concern_text;
        if($request->concern_image){
            if(isset($concern->concern_image)){
                unlink($concern->concern_image);
            }
            $concern_image = $request->file('concern_image');
            $name = time() . "_" . $concern_image->getClientOriginalName();
            $uploadPath = ('public/images/concern/');
            $concern_image->move($uploadPath, $name);
            $concern_imageImgUrl = $uploadPath . $name;
            $concern->concern_image = $concern_imageImgUrl;
        }

        if($request->concern_icon){
            if(isset($concern->concern_icon)){
                unlink($concern->concern_icon);
            }
            $concern_icon = $request->file('concern_icon');
            $name = time() . "_" . $concern_icon->getClientOriginalName();
            $uploadPath = ('public/images/concern/');
            $concern_icon->move($uploadPath, $name);
            $concern_iconImgUrl = $uploadPath . $name;
            $concern->concern_icon = $concern_iconImgUrl;
        }
        $concern->update();
        return response()->json($concern, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Concern  $concern
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $concern = Concern::findOrfail($id);
        $concern->delete();
        return response()->json('success', 200);
    }

    public function statusupdate(Request $request)
    {
        $concern = Concern::where('id',$request->concern_id)->first();
        $concern->status=$request->status;
        $concern->update();
        return response()->json($concern, 200);
    }
}