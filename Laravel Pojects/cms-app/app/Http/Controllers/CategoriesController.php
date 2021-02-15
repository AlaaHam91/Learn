<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Http\Requests\CategoryRequest;
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('Categories.index')->with('categories',Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //
       // dd($request->val);
        // $request->validate(
        //     [
        //         "name"=>"required|unique:categories"

        // ]
        // );

        //$category=new Category();
         //$category->name=$request->name;
       //  $category->save();
       // Category::create(['name'=>$request->val]);

        Category::create($request->all());

        session()->flash('success','New category: '.$request->name.' has been added');
        return redirect(route('Categories.index'));

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
    public function edit(Category $Category)
    {
        //
//dd($Category->name);
        return view('Categories.create')->with('category',$Category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $Category)
    {
        //
       // $Category->name=$request->name;
       // $Category->save();
       $Category->update(['name'=>$request->name]);
        session()->flash('success','category: '.$request->name.' has been updated');
        return redirect(route('Categories.index'));
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $Category)
    {
        //
        $Category->delete();
        return redirect(route('Categories.index'));

    }
}
