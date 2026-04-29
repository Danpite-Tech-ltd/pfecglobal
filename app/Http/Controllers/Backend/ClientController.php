<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Client;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.content.clients.index');
    }

    public function create()
    {
        return view('backend.content.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'type'  => 'required',
            'banner' => 'nullable|image|mimes:jpg,jpeg,png,webp'
        ]);

        $page = new Client();

        $page->page_name = $request->page_name;
        $page->title     = $request->title;
        $page->slug      = Str::slug($request->page_name);
        $page->type      = $request->type;
        $page->description = $request->description;
        $page->meta_title = $request->meta_title;
        $page->meta_keywords = $request->meta_keywords;
        $page->meta_description = $request->meta_description;
        $page->status = $request->status;

        if ($request->hasFile('banner')) {
            $image = $request->file('banner');
            $name = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/pages'), $name);
            $page->banner = 'uploads/pages/' . $name;
        }

        $page->save();

        return redirect()->route('admin.clients.index')
            ->with('success', 'Page created successfully');
    }

    public function clientdata()
    {
        $clients = Client::all();
        return Datatables::of($clients)
            ->addColumn('action', function ($clients) {
                return '<a href="clients/' . $clients->id . '/edit" class="btn btn-primary btn-sm" ><i class="bi bi-pencil-square"></i></a>
                <a href="#" type="button" id="deleteClientBtn" data-id="' . $clients->id . '" class="btn btn-danger btn-sm" ><i class="bi bi-archive" ></i></a>';
            })

            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Client::findOrfail($id);
        return view('backend.content.clients.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'type'  => 'required',
            'banner' => 'nullable|image|mimes:jpg,jpeg,png,webp'
        ]);

        $page = Client::findOrFail($id);

        $page->page_name = $request->page_name;
        $page->title     = $request->title;
        $page->slug      = Str::slug($request->title);
        $page->type      = $request->type;
        $page->description = $request->description;
        $page->meta_title = $request->meta_title;
        $page->meta_keywords = $request->meta_keywords;
        $page->meta_description = $request->meta_description;
        $page->status = $request->status;

        if ($request->hasFile('banner')) {
            if ($page->banner && file_exists(public_path($page->banner))) {
                unlink(public_path($page->banner));
            }

            $image = $request->file('banner');
            $name = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/pages'), $name);
            $page->banner = 'uploads/pages/' . $name;
        }

        $page->save();

        return redirect()->route('admin.clients.index')
            ->with('success', 'Page updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrfail($id);
        $client->delete();
        return response()->json('success', 200);
    }

    public function statusupdate(Request $request)
    {
        $client = Client::where('id', $request->client_id)->first();
        $client->status = $request->status;
        $client->update();
        return response()->json($client, 200);
    }
}
