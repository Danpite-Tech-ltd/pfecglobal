<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\RolesController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\UserRolesController;
use App\Http\Controllers\Backend\BasicinfoController;
use App\Http\Controllers\Backend\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\BottominfoController;
use App\Http\Controllers\Backend\AboutinfoController;
use App\Http\Controllers\Backend\ConcernController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\ClientController;
use App\Http\Controllers\Backend\TestimonialController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\PortfoliocategoryController;
use App\Http\Controllers\Backend\PortfolioController;
use App\Http\Controllers\Backend\AboutlistController;
use App\Http\Controllers\Backend\FaqController;
use App\Http\Controllers\Backend\FactoryController;
use App\Http\Controllers\Backend\PortfoliosubcategoryController;

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

Route::get('/admin/dashboard', function () {
    return view('backend.content.maincontent');
})->middleware(['auth.admin:admin'])->name('admin.dashboard');

Route::group(['prefix'=>'admin',], function () {
    // login
    // Route::get('otp', [AuthenticatedSessionController::class, 'otp'])->name('otp');
    // Route::post('otp', [AuthenticatedSessionController::class, 'otpstore'])->name('otp.store');
    Route::get('login', [AuthenticatedSessionController::class,'create'])->name('admin.loginview');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('admin.login');

    // logout
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('admin.logout');
    // reset password

});

Route::group(['prefix'=>'admin','middleware' => ['auth.admin:admin']], function () {
    // role & permission
    Route::resource('roles', RolesController::class,['names'=>'admin.roles']);
    Route::resource('userroles', UserRolesController::class,['names'=>'admin.userroles']);
    Route::resource('admins', AdminController::class,['names'=>'admin.admins']);
    Route::resource('users', UserController::class,['names'=>'admin.users']);
    // basic info
    Route::resource('basicinfos', BasicinfoController::class,['names'=>'admin.basicinfos']);
    Route::post('/pixel/analytics/{id}', [BasicinfoController::class, 'pixelanalytics']);
    Route::post('/basicinfo/update/{id}', [BasicinfoController::class, 'sociallink']);
    Route::post('/metainfo/update/{id}', [BasicinfoController::class, 'metainfo']);
    Route::get('/web/texts', [BasicinfoController::class, 'webtexts']);
    Route::post('/update/web/texts/{id}', [BasicinfoController::class, 'updatewebtexts']);
    Route::get('/web/facts', [BasicinfoController::class, 'webfacts']);
    Route::post('/update/web/facts/{id}', [BasicinfoController::class, 'updatewebfacts']);
    
    // basic info
    Route::resource('factory', FactoryController::class,['names'=>'admin.factory']); 
    // Route::post('/pixel/analytics/{id}', [FactoryController::class, 'pixelanalytics']);
    Route::post('/factory/update/{id}', [FactoryController::class, 'sociallink']);
    Route::post('/metainfo/update/{id}', [FactoryController::class, 'metainfo']);
    // Route::get('/web/texts', [FactoryController::class, 'webtexts']);
    // Route::post('/update/web/texts/{id}', [FactoryController::class, 'updatewebtexts']);
    // Route::get('/web/facts', [FactoryController::class, 'webfacts']);
    // Route::post('/update/web/facts/{id}', [FactoryController::class, 'updatewebfacts']);

    Route::get('/about-us', [BasicinfoController::class, 'aboutus']);
    Route::post('/update/about-us/{id}', [BasicinfoController::class, 'aboutusupdate']);
    Route::get('/why-choose-us', [BasicinfoController::class, 'chooseus']);
    Route::post('/update/why-choose-us/{id}', [BasicinfoController::class, 'chooseusupdate']);

    //faqs
    Route::resource('faqs', FaqController::class,['names'=>'administrator.faqs']);
    Route::get('faq/get/data', [FaqController::class, 'faqdata'])->name('administrator.faq.data');
    Route::post('faq/{id}', [FaqController::class, 'update']);
    Route::put('faq/status', [FaqController::class, 'statusupdate']);

    //Sliders
    Route::resource('sliders', SliderController::class,['names'=>'admin.sliders']);
    Route::get('slider/get/data', [SliderController::class, 'sliderdata'])->name('admin.slider.data');
    Route::post('slider/{id}', [SliderController::class, 'update']);
    Route::put('slider/status', [SliderController::class, 'statusupdate']);
    //bottominfos
    Route::resource('bottominfos', BottominfoController::class,['names'=>'admin.bottominfos']);
    Route::get('bottominfo/get/data', [BottominfoController::class, 'bottominfodata'])->name('admin.bottominfo.data');
    Route::post('bottominfo/{id}', [BottominfoController::class, 'update']);
    Route::put('bottominfo/status', [BottominfoController::class, 'statusupdate']);
    //aboutinfos
    Route::resource('aboutinfos', AboutinfoController::class,['names'=>'admin.aboutinfos']);
    Route::get('aboutinfo/get/data', [AboutinfoController::class, 'aboutinfodata'])->name('admin.aboutinfo.data');
    Route::post('aboutinfo/{id}', [AboutinfoController::class, 'update']);
    Route::put('aboutinfo/status', [AboutinfoController::class, 'statusupdate']);

    //concerninfos
    Route::resource('concerninfos', ConcernController::class,['names'=>'admin.concerninfos']);
    Route::get('concerninfo/get/data', [ConcernController::class, 'concerninfodata'])->name('admin.concerninfo.data');
    Route::post('concerninfo/{id}', [ConcernController::class, 'update']);
    Route::put('concerninfo/status', [ConcernController::class, 'statusupdate']);
    Route::get('concerndetails', [ConcernController::class, 'detailsindex'])->name('admin.concerndetails');
    Route::get('concern-details/get/data', [ConcernController::class, 'concernlistdetails'])->name('admin.concerndetails.data');
    Route::get('concern/{slug}', [ConcernController::class, 'concerndetails']);
    Route::post('concern-details/update', [ConcernController::class, 'concerndetailsupdate']);

    //aboutlists
    Route::resource('aboutus', AboutlistController::class,['names'=>'admin.aboutlists']);
    Route::get('chooseus-data', [AboutlistController::class,'indexchoose']);
    Route::get('service-data', [AboutlistController::class,'indexservice']);
    Route::get('teams-data', [AboutlistController::class,'indexteams']);
    Route::get('testimonial-data', [AboutlistController::class,'indextestimonial']);
    Route::post('aboutus/{id}', [AboutlistController::class, 'update']);
    Route::post('about-details/update', [AboutlistController::class, 'aboutdetailsupdate']);

    //serviceinfo
    Route::resource('services', ServiceController::class,['names'=>'admin.services']);
    Route::get('service/get/data', [ServiceController::class, 'servicedata'])->name('admin.service.data');
    Route::post('service/{id}', [ServiceController::class, 'update']);
    Route::put('service/status', [ServiceController::class, 'statusupdate']);
    //clients
    Route::resource('clients', ClientController::class,['names'=>'admin.clients']);
    Route::get('client/get/data', [ClientController::class, 'clientdata'])->name('admin.client.data');
    Route::post('client/{id}', [ClientController::class, 'update']);
    Route::put('client/status', [ClientController::class, 'statusupdate']);
    //testimonials
    Route::resource('testimonials', TestimonialController::class,['names'=>'admin.testimonials']);
    Route::get('testimonial/get/data', [TestimonialController::class, 'testimonialdata'])->name('admin.testimonial.data');
    Route::post('testimonial/{id}', [TestimonialController::class, 'update']);
    Route::put('testimonial/status', [TestimonialController::class, 'statusupdate']);
    //testimonials
    Route::resource('teams', TeamController::class,['names'=>'admin.teams']);
    Route::get('team/get/data', [TeamController::class, 'teamdata'])->name('admin.team.data');
    Route::post('team/{id}', [TeamController::class, 'update']);
    Route::put('team/status', [TeamController::class, 'statusupdate']);
    //portfoliocategory
    Route::resource('portfoliocategories', PortfoliocategoryController::class,['names'=>'admin.portfoliocategories']);
    Route::get('portfoliocategory/get/data', [PortfoliocategoryController::class, 'portfoliocategorydata'])->name('admin.portfoliocategory.data');
    Route::post('portfoliocategory/{id}', [PortfoliocategoryController::class, 'update']);
    Route::put('portfoliocategory/status', [PortfoliocategoryController::class, 'statusupdate']);
    //portfoliosubcategory
    Route::resource('portfoliosubcategories', PortfoliosubcategoryController::class,['names'=>'admin.portfoliosubcategories']);
    Route::get('portfoliosubcategory/get/data', [PortfoliosubcategoryController::class, 'portfoliosubcategorydata'])->name('admin.portfoliosubcategory.data');
    Route::post('portfoliosubcategory/{id}', [PortfoliosubcategoryController::class, 'update']);
    Route::put('portfoliosubcategory/status', [PortfoliosubcategoryController::class, 'statusupdate']);
    //portfolios
    Route::resource('portfolios', PortfolioController::class,['names'=>'admin.portfolios']);
    Route::get('portfolio/get/data', [PortfolioController::class, 'portfoliodata'])->name('admin.portfolio.data');
    Route::post('portfolio/{id}', [PortfolioController::class, 'update']);
    Route::put('portfolio/status', [PortfolioController::class, 'statusupdate']);
    Route::get('/get-subcategory/{category_id}', [PortfolioController::class, 'getSubcategory']);


});
