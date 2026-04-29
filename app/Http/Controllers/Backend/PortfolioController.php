<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Portfolio;
use App\Models\Portfoliocategory;
use App\Models\Portfoliosubcategory;
use Illuminate\Http\Request;
use DataTables;
use Str;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.content.portfolio.index');
    }

    public function create()
    {
        $categories = Portfoliocategory::where('status', 'Active')->get();
        $subcategories = Portfoliosubcategory::where('status', 'Active')->get();
        return view('backend.content.portfolio.create', ['categories' => $categories, 'subcategories' => $subcategories]);
    }

    public function portfolios()
    {
        return view('webview.content.portfolios');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $blog = new Portfolio();
        $blog->author = $request->author;
        $blog->study_title = $request->study_title;
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->short_description = $request->short_description;
        $blog->description = $request->description;
        $blog->meta_title = $request->meta_title;
        $blog->meta_keywords = $request->meta_keywords;
        $blog->meta_description = $request->meta_description;
        $blog->status = $request->status;

        if ($request->hasFile('thumbnail')) {
            $portfolio_image = $request->file('thumbnail');
            $name = time() . "_" . $portfolio_image->getClientOriginalName();
            $uploadPath = ('public/images/portfolio/');
            $portfolio_image->move($uploadPath, $name);
            $portfolio_imageImgUrl = $uploadPath . $name;
            $blog->thumbnail = $portfolio_imageImgUrl;
        }

        $blog->save();

        return redirect()->route('admin.portfolios.index')->with('success', 'Blog created successfully');
    }

    public function portfoliodata()
    {
        $portfolios = Portfolio::with(['portfoliocategories'])->get();

        return Datatables::of($portfolios)
            ->addColumn('action', function ($portfolios) {
                return '<a href="portfolios/' . $portfolios->id . '/edit"   class="btn btn-primary btn-sm"  ><i class="bi bi-pencil-square"></i></a>
                <a href="#" type="button" id="deleteBlogBtn" data-id="' . $portfolios->id . '" class="btn btn-danger btn-sm" ><i class="bi bi-archive" ></i></a>';
            })

            ->make(true);
    }

    public function getportfolio($slug)
    {
        if ($slug == 'all') {
            $portfolios = Portfolio::with(['portfoliocategories'])->where('status', 'Active')->get();
        } else {
            $portfolios = Portfolio::with(['portfoliocategories'])->where('category_id', $slug)->where('status', 'Active')->get();
        }
        return view('webview.content.portfoliotab', ['portfolios' => $portfolios]);
    }

    public function getportfoliobyid($id)
    {
        $portfolio = Portfolio::with(['portfoliocategories'])->where('id', $id)->where('status', 'Active')->first();
        return view('webview.content.portfoliodetails', ['portfolio' => $portfolio]);
    }

    public function getSubcategory($category_id)
    {
        $subcategories = Portfoliosubcategory::where('category_id', $category_id)->get();
        return response()->json($subcategories);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Portfolio::findOrFail($id);
        $categories = Portfoliocategory::where('status', 'Active')->get();
        $subcategories = Portfoliosubcategory::where('status', 'Active')->get();
        return view('backend.content.portfolio.edit', compact('blog', 'categories','subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = Portfolio::findOrFail($id);

        $blog->author = $request->author;
        $blog->study_title = $request->study_title;
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->short_description = $request->short_description;
        $blog->description = $request->description;
        $blog->meta_title = $request->meta_title;
        $blog->meta_keywords = $request->meta_keywords;
        $blog->meta_description = $request->meta_description;
        $blog->status = $request->status;

        if ($request->hasFile('thumbnail')) {
            if ($blog->thumbnail && file_exists(public_path($blog->thumbnail))) {
                unlink(public_path($blog->thumbnail));
            }
            $portfolio_image = $request->file('thumbnail');
            $name = time() . "_" . $portfolio_image->getClientOriginalName();
            $uploadPath = ('public/images/portfolio/');
            $portfolio_image->move($uploadPath, $name);
            $portfolio_imageImgUrl = $uploadPath . $name;
            $blog->thumbnail = $portfolio_imageImgUrl;
        }

        $blog->update();

        return redirect()->route('admin.portfolios.index')->with('success', 'Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::findOrfail($id);
        $portfolio->delete();
        return response()->json('success', 200);
    }

    public function statusupdate(Request $request)
    {
        $portfolio = Portfolio::where('id', $request->portfolio_id)->first();
        $portfolio->status = $request->status;
        $portfolio->update();
        return response()->json($portfolio, 200);
    }
}
