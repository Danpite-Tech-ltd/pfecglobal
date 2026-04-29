<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Portfoliocategory;
use App\Models\Portfoliosubcategory;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function product_category($slug)
    {
        $category = Portfoliocategory::where('slug',$slug)->first();
        $subcategories = Portfoliosubcategory::where('status','Active')->where('category_id',$category->id)->get();
        return view('webview.productcategory',compact('category','subcategories'));
    }

    public function product_subcategory($category_slug, $subcategory_slug)
    {
        $category = Portfoliocategory::where('slug', $category_slug)->first();
        $subcategory = Portfoliosubcategory::where('slug', $subcategory_slug)->first();
        $subcategories = Portfoliosubcategory::where('category_id', $category->id)->latest()->get();
        $products = Portfolio::where('subcategory_id',$subcategory->id)->get();
        return view('webview.productsubcategory',compact('subcategories', 'products', 'subcategory', 'category'));
    }
}
