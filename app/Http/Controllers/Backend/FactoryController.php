<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Factory;
use Illuminate\Http\Request;

class FactoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webinfo =Factory::first();
        return view('backend.content.factory',['webinfo'=>$webinfo]);
    }

    public function webtexts()
    {
        $webinfo =Factory::first();
        return view('backend.content.Factory.webtext',['webinfo'=>$webinfo]);
    }
    public function webfacts()
    {
        $webinfo =Factory::first();
        return view('backend.content.Factory.webfacts',['webinfo'=>$webinfo]);
    }

    public function updatewebfacts(Request $request, $id)
    {
        $webinfo =Factory::where('id',$id)->first();
        if(isset($request->clients)){
            $webinfo->clients=$request->clients;
        }else{
            $webinfo->clients=null;
        }
        if(isset($request->projects)){
            $webinfo->projects=$request->projects;
        }else{
            $webinfo->projects=null;
        }
        if(isset($request->workers)){
            $webinfo->workers=$request->workers;
        }else{
            $webinfo->workers=null;
        }
        if(isset($request->working_hour)){
            $webinfo->working_hour=$request->working_hour;
        }else{
            $webinfo->working_hour=null;
        }

        if($request->screenshot){
            if($webinfo->screenshot ==''){
            }else{
                unlink($webinfo->screenshot);
            }
            $logo = $request->file('screenshot');
            $name = time() . "_" . $logo->getClientOriginalName();
            $uploadPath = ('public/images/screenshot/');
            $logo->move($uploadPath, $name);
            $logoImgUrl = $uploadPath . $name;
            $webinfo->screenshot = $logoImgUrl;
        }

        $webinfo->update();
        return redirect()->back()->with('message','Facts info updated successfully');
    }

    public function updatewebtexts(Request $request, $id)
    {
        $webinfo =Factory::where('id',$id)->first();
        if(isset($request->about_us)){
            $webinfo->about_us=$request->about_us;
        }else{
            $webinfo->about_us=null;
        }
        if(isset($request->concern)){
            $webinfo->concern=$request->concern;
        }else{
            $webinfo->concern=null;
        }
        if(isset($request->service_info)){
            $webinfo->service_info=$request->service_info;
        }else{
            $webinfo->service_info=null;
        }
        if(isset($request->call_to)){
            $webinfo->call_to=$request->call_to;
        }else{
            $webinfo->call_to=null;
        }
        if(isset($request->fact_info)){
            $webinfo->fact_info=$request->fact_info;
        }else{
            $webinfo->fact_info=null;
        }
        if(isset($request->team_info)){
            $webinfo->team_info=$request->team_info;
        }else{
            $webinfo->team_info=null;
        }

        if(isset($request->contact_us)){
            $webinfo->contact_us=$request->contact_us;
        }else{
            $webinfo->contact_us=null;
        }

        if(isset($request->news)){
            $webinfo->news=$request->news;
        }else{
            $webinfo->news=null;
        }

        if(isset($request->footer_text_logo)){
            $webinfo->footer_text_logo=$request->footer_text_logo;
        }else{
            $webinfo->footer_text_logo=null;
        }


        $webinfo->update();
        return redirect()->back()->with('message','Meta info updated successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Factory  $Factory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $webinfo =Factory::where('id',$id)->first();
        $webinfo->email=$request->email;
        $webinfo->phone_one=$request->phone_one;
        $webinfo->phone_two=$request->phone_two;
        $webinfo->phone_three=$request->phone_three;
        $webinfo->phone_four=$request->phone_four;
        $webinfo->phone_five=$request->phone_five;
        $webinfo->email_two=$request->email_two;
        $webinfo->email_three=$request->email_three;
        $webinfo->address=$request-> address;
        $webinfo->ecommerweb=$request-> ecommerweb;
        if($request->logo){
            if($webinfo->logo =='public/webview/assets/images/logo.png'){
            }else{
                // unlink($webinfo->logo);
            }
            $logo = $request->file('logo');
            $name = time() . "_" . $logo->getClientOriginalName();
            $uploadPath = ('public/images/categorybanner/');
            $logo->move($uploadPath, $name);
            $logoImgUrl = $uploadPath . $name;
            $webinfo->logo = $logoImgUrl;
        }
        $webinfo->save();
        return redirect()->back()->with('message','Info updated successfully');
    }

    public function pixelanalytics(Request $request, $id)
    {
        $webinfo =Factory::where('id',$id)->first();
        $webinfo->facebook_pixel=$request->facebook_pixel;
        $webinfo->google_analytics=$request->google_analytics;
        $webinfo->update();
        return redirect()->back()->with('message','Pixel & Analytics updated successfully');
    }

    public function sociallink(Request $request, $id)
    {
        $webinfo =Factory::where('id',$id)->first();
        if(isset($request->facebook)){
            $webinfo->facebook=$request->facebook;
        }else{
            $webinfo->facebook=null;
        }
        if(isset($request->twitter)){
            $webinfo->twitter=$request->twitter;
        }else{
            $webinfo->twitter=null;
        }
        if(isset($request->google)){
            $webinfo->google=$request->google;
        }else{
            $webinfo->google=null;
        }
        if(isset($request->rss)){
            $webinfo->rss=$request->rss;
        }else{
            $webinfo->rss=null;
        }
        if(isset($request->pinterest)){
            $webinfo->pinterest=$request->pinterest;
        }else{
            $webinfo->pinterest=null;
        }
        if(isset($request->linkedin)){
            $webinfo->linkedin=$request->linkedin;
        }else{
            $webinfo->linkedin=null;
        }
        if(isset($request->youtube)){
            $webinfo->youtube=$request->youtube;
        }else{
            $webinfo->youtube=null;
        }
        $webinfo->update();
        return redirect()->back()->with('message','Social Links updated successfully');
    }

    public function metainfo(Request $request, $id)
    {
        $webinfo =Factory::where('id',$id)->first();
        if(isset($request->title)){
            $webinfo->title=$request->title;
        }else{
            $webinfo->title=null;
        }
        if(isset($request->meta_title)){
            $webinfo->meta_title=$request->meta_title;
        }else{
            $webinfo->meta_title=null;
        }
        if(isset($request->meta_keywords)){
            $webinfo->meta_keywords=$request->meta_keywords;
        }else{
            $webinfo->meta_keywords=null;
        }
        if(isset($request->meta_description)){
            $webinfo->meta_description=$request->meta_description;
        }else{
            $webinfo->meta_description=null;
        }

        if($request->meta_image){
            if($webinfo->meta_image ==''){
            }else{
               //unlink($webinfo->meta_image);
            }
            $logo = $request->file('meta_image');
            $name = time() . "_" . $logo->getClientOriginalName();
            $uploadPath = ('public/images/meta/');
            $logo->move($uploadPath, $name);
            $logoImgUrl = $uploadPath . $name;
            $webinfo->meta_image = $logoImgUrl;
        }

        $webinfo->update();
        return redirect()->back()->with('message','Meta info updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Factory  $Factory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Factory $Factory)
    {
        //
    }
}
