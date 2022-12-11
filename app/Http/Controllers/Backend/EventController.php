<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Event;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events=Event::orderBy('id','desc')->get();
        return view('backend.event.view',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.event.add');
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

          $banner=new Event();
          $banner->create($validate);
          Session::flash('message',"Event Created Successfully");
          return redirect()->route('event.index');
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
        $event=Event::orderBy('id','desc')->where('id',$id)->first();
        return view('backend.event.edit',compact('event'));
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
        $event=Event::find($id);
        $event->update($validate);
        Session::flash('message',"Event Updated Successfully");
        return redirect()->route('event.index');
    }
    public function status_update(Request $request)
    {
        if($request->mode=='true'){
       
            Event::where('id',$request->id)->update(['status'=>'active']);
        }
        else{
           Event::where('id',$request->id)->update(['status'=>'inactive']);
        }
        return response()->json(['success'=>'Status updated successfully']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Event::where('id',$id)->delete();
        Session::flash('message',"Event Deleted Successfully");
        return redirect()->route('event.index');
    }
}
