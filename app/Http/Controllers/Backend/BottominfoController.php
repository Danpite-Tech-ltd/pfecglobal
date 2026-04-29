<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Bottominfo;
use Illuminate\Http\Request;
use DataTables;

class BottominfoController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.content.slider.bottomindex');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(empty($request->bottom_title)){
            return response()->json('error', 200);
        }
        $bottom =new Bottominfo();
        $bottom->bottom_title =$request->bottom_title;
        $bottom->bottom_text =$request->bottom_text;
        $bottomimage = $request->file('bottom_image');
        $name = time() . "_" . $bottomimage->getClientOriginalName();
        $uploadPath = ('public/images/bottom/');
        $bottomimage->move($uploadPath, $name);
        $bottomimageImgUrl = $uploadPath . $name;
        $bottom->bottom_image = $bottomimageImgUrl;
        $bottom->save();
        return response()->json($bottom, 200);
    }

    public function bottominfodata()
    {
        $bottoms = Bottominfo::all();
        return Datatables::of($bottoms)
            ->addColumn('action', function ($bottoms) {
                return '<a href="#" type="button" id="editBottominfoBtn" data-id="' . $bottoms->id . '"   class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editmainBottominfo" ><i class="bi bi-pencil-square"></i></a>';
            })

            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bottominfo  $bottom
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bottom = Bottominfo::findOrfail($id);
        return response()->json($bottom, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bottominfo  $bottom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bottom = Bottominfo::findOrfail($id);
        if(empty($request->bottom_title)){
            return response()->json('error', 200);
        }
        $bottom->bottom_title =$request->bottom_title;
        $bottom->bottom_text =$request->bottom_text;
        if($request->bottom_image){
            unlink($bottom->bottom_image);
            $bottom_image = $request->file('bottom_image');
            $name = time() . "_" . $bottom_image->getClientOriginalName();
            $uploadPath = ('public/images/bottom/');
            $bottom_image->move($uploadPath, $name);
            $bottom_imageImgUrl = $uploadPath . $name;
            $bottom->bottom_image = $bottom_imageImgUrl;
        }
        $bottom->update();
        return response()->json($bottom, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bottominfo  $bottom
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bottom = Bottominfo::findOrfail($id);
        $bottom->delete();
        return response()->json('success', 200);
    }

    public function statusupdate(Request $request)
    {
        $bottom = Bottominfo::where('id',$request->bottom_id)->first();
        $bottom->status=$request->status;
        $bottom->update();
        return response()->json($bottom, 200);
    }
}