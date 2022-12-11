<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AboutusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Aboutus=AboutUs::orderBy('id','desc')->get();
        return view('backend.aboutus.view',compact('Aboutus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.aboutus.add');
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
            'photo' => 'required',
            'description' => 'required',
        ], [
            'photo.required'  => 'Photo field is required',
            'description.required' => 'Description field is required'
          ]);

          $aboutus=new AboutUs();
          $aboutus->create($validate);
          Session::flash('message',"Aboutus Created Successfully");
          return redirect()->route('aboutus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aboutus=AboutUs::orderBy('id','desc')->where('id',$id)->first();
        return view('backend.aboutus.edit',compact('aboutus'));
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
            'photo' => 'required',
            'description' => 'required',
        ], [

            'photo.required'  => 'Photo field is required',
            'description.required' => 'Description field is required'
          ]);
        $aboutus=AboutUs::find($id);
        $aboutus->update($validate);
        Session::flash('message',"Aboutus Updated Successfully");
        return redirect()->route('aboutus.index');
    }
    public function status_update(Request $request)
    {
        if($request->mode=='true'){
            AboutUs::where('id',$request->id)->update(['status'=>'active']);
        }
        else{
           AboutUs::where('id',$request->id)->update(['status'=>'inactive']);
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
        AboutUs::where('id',$id)->delete();
        Session::flash('message',"Aboutus Deleted Successfully");
        return redirect()->route('aboutus.index');
    }
}
