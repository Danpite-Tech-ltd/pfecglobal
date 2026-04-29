<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Portfoliocategory;
use App\Models\Portfoliosubcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DataTables;


class PortfoliosubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Portfoliocategory::all();
        return view('backend.content.portfoliosubcategorys.index',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (empty($request->category_id)) {
            return response()->json('error', 200);
        }
        $portfoliosubcategory = new Portfoliosubcategory();
        $portfoliosubcategory->category_id = $request->category_id;
        $portfoliosubcategory->subcategory_name = $request->subcategory_name;
        $portfoliosubcategory->slug = Str::slug($request->subcategory_name);
        $portfoliosubcategory->title = $request->title;
        $portfoliosubcategory->subtitle = $request->subtitle;
        $portfoliosubcategory->details = $request->details;
        $portfoliosubcategory->status = 'Active';

        if ($request->file('image')) {
            $image = $request->file('image');

            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'public/uploads/subcategory/';
            $image->move($imagePath, $imageName);

            $portfoliosubcategory->image   = $imagePath . $imageName;
        }

        $portfoliosubcategory->save();
        return response()->json($portfoliosubcategory, 200);
    }

    public function portfoliosubcategorydata()
    {
        $portfoliosubcategorys = Portfoliosubcategory::all();
        return Datatables::of($portfoliosubcategorys)
            ->addColumn('action', function ($portfoliosubcategorys) {
                return '<a href="#" type="button" id="editCategoryBtn" data-id="' . $portfoliosubcategorys->id . '"   class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editmainCategory" ><i class="bi bi-pencil-square"></i></a>';
            })

            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfoliosubcategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $portfoliosubcategory = Portfoliosubcategory::findOrfail($id);
        return response()->json($portfoliosubcategory, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfoliosubcategory  $portfoliosubcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $portfoliosubcategory = Portfoliosubcategory::findOrfail($id);

        $portfoliosubcategory->category_id = $request->category_id;
        $portfoliosubcategory->subcategory_name = $request->subcategory_name;
        $portfoliosubcategory->slug = Str::slug($request->subcategory_name);
        $portfoliosubcategory->title = $request->title;
        $portfoliosubcategory->subtitle = $request->subtitle;
        $portfoliosubcategory->details = $request->details;
         if ($request->file('image')) {
            $image = $request->file('image');

            if (!is_null($portfoliosubcategory->image) && file_exists($portfoliosubcategory->image)) {
                unlink($portfoliosubcategory->image);
            }

            $imageName          = microtime('.') . '.' . $image->getClientOriginalExtension();
            $imagePath          = 'public/uploads/subcategory/';
            $image->move($imagePath, $imageName);

            $portfoliosubcategory->image   = $imagePath . $imageName;
        }

        $portfoliosubcategory->update();
        return response()->json($portfoliosubcategory, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfoliosubcategory  $portfoliosubcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfoliosubcategory = Portfoliosubcategory::findOrfail($id);
        $portfoliosubcategory->delete();
        return response()->json('success', 200);
    }

    public function statusupdate(Request $request)
    {
        $portfoliosubcategory = Portfoliosubcategory::where('id', $request->portfoliosubcategory_id)->first();
        $portfoliosubcategory->status = $request->status;
        $portfoliosubcategory->update();
        return response()->json($portfoliosubcategory, 200);
    }
}
