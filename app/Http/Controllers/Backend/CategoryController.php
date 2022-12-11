<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::orderBy('id','desc')->get();
        return view('backend.category.view',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.add');
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
            'category' => 'required',

        ], [
            'category.required' => 'Category field is required',

          ]);

          $category=new Category();
          $category->create($validate);
          Session::flash('message',"Category Created Successfully");
          return redirect()->route('category.index');
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
        $category=Category::orderBy('id','desc')->where('id',$id)->first();
        return view('backend.category.edit',compact('category'));
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
            'category' => 'required',
        ], [
            'category.required' => 'Category field is required'
          ]);
        $category=Category::find($id);
        $category->update($validate);
        Session::flash('message',"Category Updated Successfully");
        return redirect()->route('category.index');
    }
    public function status_update(Request $request)
    {
        if($request->mode=='true'){
            Category::where('id',$request->id)->update(['status'=>'active']);
        }
        else{
           Category::where('id',$request->id)->update(['status'=>'inactive']);
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
        Category::where('id',$id)->delete();
        Session::flash('message',"Category Deleted Successfully");
        return redirect()->route('category.index');
    }
}
