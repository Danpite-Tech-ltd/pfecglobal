<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use DataTables;

class TestimonialController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.content.testimonial.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $testimonial =new Testimonial();
        $testimonial->name =$request->name;
        $testimonial->title =$request->title;
        $testimonial->text =$request->text;
        $testimonialimage = $request->file('image');
        $name = time() . "_" . $testimonialimage->getClientOriginalName();
        $uploadPath = ('public/images/testimonial/');
        $testimonialimage->move($uploadPath, $name);
        $testimonialimageImgUrl = $uploadPath . $name;
        $testimonial->image = $testimonialimageImgUrl;
        $testimonial->save();
        return response()->json($testimonial, 200);
    }

    public function testimonialdata()
    {
        $testimonials = Testimonial::all();
        return Datatables::of($testimonials)
            ->addColumn('action', function ($testimonials) {
                return '<a href="#" type="button" id="editTestimonialBtn" data-id="' . $testimonials->id . '"   class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editmainTestimonial" ><i class="bi bi-pencil-square"></i></a>
                <a href="#" type="button" id="deleteTestimonialBtn" data-id="' . $testimonials->id . '" class="btn btn-danger btn-sm" ><i class="bi bi-archive" ></i></a>';
            })

            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonial = Testimonial::findOrfail($id);
        return response()->json($testimonial, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrfail($id);

        $testimonial->name =$request->name;
        $testimonial->title =$request->title;
        $testimonial->text =$request->text;
        if($request->image){
            // unlink($testimonial->image);
            $image = $request->file('image');
            $name = time() . "_" . $image->getClientOriginalName();
            $uploadPath = ('public/images/testimonial/');
            $image->move($uploadPath, $name);
            $imageImgUrl = $uploadPath . $name;
            $testimonial->image = $imageImgUrl;
        }
        $testimonial->update();
        return response()->json($testimonial, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrfail($id);
        $testimonial->delete();
        return response()->json('success', 200);
    }

    public function statusupdate(Request $request)
    {
        $testimonial = Testimonial::where('id',$request->testimonial_id)->first();
        $testimonial->status=$request->status;
        $testimonial->update();
        return response()->json($testimonial, 200);
    }
}
