<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Service;
use Illuminate\Http\Request;
use DataTables;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.content.service.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if (empty($request->service_title)) {
        //     return response()->json('error', 200);
        // }
        $service = new Service();
        $service->service_title = $request->service_title;
        $service->service_text = $request->service_text;
        $service->link = $request->link;
        $service->subtitle = $request->subtitle;
        $serviceimage = $request->file('service_image');
        $name = time() . "_" . $serviceimage->getClientOriginalName();
        $uploadPath = ('public/images/service/');
        $serviceimage->move($uploadPath, $name);
        $serviceimageImgUrl = $uploadPath . $name;
        $service->service_image = $serviceimageImgUrl;
        $service->save();
        return response()->json($service, 200);
    }

    public function servicedata()
    {
        $services = Service::all();
        return Datatables::of($services)
            ->addColumn('action', function ($services) {
                return '<a href="#" type="button" id="editServiceBtn" data-id="' . $services->id . '"   class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editmainService" ><i class="bi bi-pencil-square"></i></a>
                <a href="#" type="button" id="deleteServiceBtn" data-id="' . $services->id . '" class="btn btn-danger btn-sm" ><i class="bi bi-archive" ></i></a>';
            })

            ->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::findOrfail($id);
        return response()->json($service, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $service = Service::findOrfail($id);
        // if (empty($request->service_title)) {
        //     return response()->json('error', 200);
        // }
        $service->service_title = $request->service_title;
        $service->link = $request->link;
        $service->subtitle = $request->subtitle;
        $service->service_text = $request->service_text;
        if ($request->service_image) {
            unlink($service->service_image);
            $service_image = $request->file('service_image');
            $name = time() . "_" . $service_image->getClientOriginalName();
            $uploadPath = ('public/images/service/');
            $service_image->move($uploadPath, $name);
            $service_imageImgUrl = $uploadPath . $name;
            $service->service_image = $service_imageImgUrl;
        }
        $service->update();
        return response()->json($service, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::findOrfail($id);
        $service->delete();
        return response()->json('success', 200);
    }

    public function statusupdate(Request $request)
    {
        $service = Service::where('id', $request->service_id)->first();
        $service->status = $request->status;
        $service->update();
        return response()->json($service, 200);
    }
}
