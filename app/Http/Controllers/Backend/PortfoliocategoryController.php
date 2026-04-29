<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Portfoliocategory;
use Illuminate\Http\Request;
use DataTables;
use Str;

class PortfoliocategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.content.portfoliocategorys.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (empty($request->category_name)) {
            return response()->json('error', 200);
        }
        $portfoliocategory = new Portfoliocategory();
        $portfoliocategory->category_name = $request->category_name;
        $portfoliocategory->slug = Str::slug($request->category_name);
        $portfoliocategory->save();
        return response()->json($portfoliocategory, 200);
    }

    public function portfoliocategorydata()
    {
        $portfoliocategorys = Portfoliocategory::all();
        return Datatables::of($portfoliocategorys)
            ->addColumn('action', function ($portfoliocategorys) {
                return '<a href="#" type="button" id="editCategoryBtn" data-id="' . $portfoliocategorys->id . '"   class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editmainCategory" ><i class="bi bi-pencil-square"></i></a>
                <a href="#" type="button" id="deleteCategoryBtn" data-id="' . $portfoliocategorys->id . '" class="btn btn-danger btn-sm" ><i class="bi bi-archive" ></i></a>';
            })

            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfoliocategory  $portfoliocategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $portfoliocategory = Portfoliocategory::findOrfail($id);
        return response()->json($portfoliocategory, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfoliocategory  $portfoliocategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $portfoliocategory = Portfoliocategory::findOrfail($id);
        if (empty($request->category_name)) {
            return response()->json('error', 200);
        }
        $portfoliocategory->category_name = $request->category_name;
        $portfoliocategory->slug = Str::slug($request->category_name);
        $portfoliocategory->update();
        return response()->json($portfoliocategory, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfoliocategory  $portfoliocategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfoliocategory = Portfoliocategory::findOrfail($id);
        $portfoliocategory->delete();
        return response()->json('success', 200);
    }

    public function statusupdate(Request $request)
    {
        $portfoliocategory = Portfoliocategory::where('id', $request->portfoliocategory_id)->first();
        $portfoliocategory->status = $request->status;
        $portfoliocategory->update();
        return response()->json($portfoliocategory, 200);
    }
}
