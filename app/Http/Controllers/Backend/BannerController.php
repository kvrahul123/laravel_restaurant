<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use Illuminate\Support\Facades\Session;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners=Banner::orderBy('id','desc')->get();
        return view('backend.banner.view',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.banner.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validate= $this->validate(request(), [
            'title' => 'required',
            'photo' => 'required',
            'description' => 'required',
        ], [
            'title.required' => 'Title field is required',
            'photo.required'  => 'Photo field is required',
            'description.required' => 'Description field is required'
          ]);

          $banner=new Banner();
          $banner->create($validate);
          Session::flash('message',"Banner Created Successfully");
          return redirect()->route('banner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $banner=Banner::orderBy('id','desc')->where('id',$id)->first();
        return view('backend.banner.edit',compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate= $this->validate(request(), [
            'title' => 'required',
            'photo' => 'required',
            'description' => 'required',
        ], [
            'title.required' => 'Title field is required',
            'photo.required'  => 'Photo field is required',
            'description.required' => 'Description field is required'
          ]);
        $banner=Banner::find($id);
        $banner->update($validate);
        Session::flash('message',"Banner Updated Successfully");
        return redirect()->route('banner.index');
    }

    public function status_update(Request $request)
    {
        if($request->mode=='true'){
            Banner::where('id',$request->id)->update(['status'=>'active']);
        }
        else{
           Banner::where('id',$request->id)->update(['status'=>'inactive']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Banner::where('id',$id)->delete();
        Session::flash('message',"Banner Deleted Successfully");
        return redirect()->route('banner.index');
    }
}
