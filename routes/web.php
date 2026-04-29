<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListdetailController;
use App\Http\Controllers\Backend\PortfolioController;
use App\Http\Controllers\FrontendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('webview.content.maincontent');
});

Route::get('services', [ListdetailController::class, 'services']);
Route::get('about-us', [ListdetailController::class, 'aboutus']);
Route::get('blogs', [ListdetailController::class, 'blogs']);
Route::get('blog/category/{slug}', [ListdetailController::class, 'categoryblog']);
Route::get('blog/{slug}', [ListdetailController::class, 'blogdetails']);
Route::get('contact-us', [ListdetailController::class, 'contact']);
Route::post('contact-post', [ListdetailController::class, 'contact_post']);
Route::get('concern/{slug}', [ListdetailController::class, 'concernindexview']);
Route::get('factory', [ListdetailController::class, 'factory']);
Route::get('products', [ListdetailController::class, 'products']);
Route::get('blacklist', [ListdetailController::class, 'blacklist']);
// product category
Route::get('/product/category/{slug}',[FrontendController::class,'product_category']);
Route::get('/product/subcategory/{category_slug}/{subcategory_slug}',[FrontendController::class,'product_subcategory']);

Route::get('portfolio/{slug}', [PortfolioController::class, 'getportfolio']);

Route::get('view-portfolio/{id}', [PortfolioController::class, 'getportfoliobyid']);

Route::get('portfolios', [PortfolioController::class, 'portfolios']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth:web'])->name('dashboard');
require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';

Route::get('page/{slug}', [ListdetailController::class, 'pagedata']);
