<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Aboutlist;
use App\Models\Contact;
use Illuminate\Http\Request;
use DataTables;

class AboutlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutus = Aboutlist::findOrfail(1);
        return view('backend.content.aboutlists.index', ['aboutus' => $aboutus]);
    }

    public function indexchoose()
    {
        $aboutus = Aboutlist::findOrfail(2);
        return view('backend.content.aboutlists.whychooseus', ['aboutus' => $aboutus]);
    }

    public function indexservice()
    {
        $aboutus = Aboutlist::findOrfail(3);
        return view('backend.content.aboutlists.pagetext', ['aboutus' => $aboutus]);
    }

    public function indexteams()
    {
        $aboutus = Aboutlist::findOrfail(4);
        return view('backend.content.aboutlists.pagetext', ['aboutus' => $aboutus]);
    }

    public function indextestimonial()
    {
        $aboutus = Aboutlist::findOrfail(5);
        return view('backend.content.aboutlists.pagetext', ['aboutus' => $aboutus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aboutlist  $aboutlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $aboutlist = Aboutlist::findOrfail($id);
        $aboutlist->title = $request->title;
        $aboutlist->details = $request->details;
        $aboutlist->small_details = $request->small_details;
        $aboutlist->title_one = $request->title_one;
        $aboutlist->title_two = $request->title_two;
        $aboutlist->title_three = $request->title_three;
        $aboutlist->title_four = $request->title_four;
        $aboutlist->title_five = $request->title_five;
        $serviceimage = $request->file('image');
        if ($serviceimage) {
            $name = time() . "_" . $serviceimage->getClientOriginalName();
            $uploadPath = ('public/about/');
            $serviceimage->move($uploadPath, $name);
            $serviceimageImgUrl = $uploadPath . $name;
            $aboutlist->image = $serviceimageImgUrl;
        }
        $aboutlist->update();
        return redirect()->back()->with('success', 'Information update successfully');
    }

    public function register_members()
    {
        $contacts = Contact::latest()->paginate(20);
        return view('backend.content.registermembers.index', compact('contacts'));
    }
}
