<?php

namespace App\Providers;

use App\Models\Aboutinfo;
use Illuminate\Support\ServiceProvider;
use App\Models\Slider;
use App\Models\Basicinfo;
use App\Models\Testimonial;
use App\Models\Team;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\Faq;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view) {
            $basicinfo = Basicinfo::first();

            $view->with([
                'basicinfo' => $basicinfo,
            ]);
        });

        view()->composer('webview.content.maincontent', function($view) {
            $sliders = Slider::where('status','Active')->get();
            $teams = Team::where('status','Active')->get()->chunk(4);
            $testimonials = Testimonial::where('status','Active')->get();
            $portfolios = Portfolio::with('portfoliocategories')->where('status','Active')->get();
            $faqs = Faq::where('status','Active')->get();
            $clientcounter = Aboutinfo::where('status','Active')->get();
            $services = Service::where('status','Active')->get();

            $view->with([
                'sliders' => $sliders,
                'teams' => $teams,
                'testimonials' => $testimonials,
                'portfolios' => $portfolios,
                'faqs'=>$faqs,
                'clientcounter'=>$clientcounter,
                'services' => $services
            ]);
        });

    }
}
