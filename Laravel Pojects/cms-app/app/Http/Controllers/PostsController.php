<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Arr;
use App\Category;
use App\Tag;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('CheckCategory')->only('create');
     }
    public function index()
    {
        //
        return view('Posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Posts.create')->with('categories',Category::all())->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        //
        $post=Post::create(
            [
                'Title'=>$request->get('Title'),
                'description'=>$request->get('pdesc'),
                'content'=>$request->get('pcontent'),
                'image'=>$request->pimage->store('pimages','public'),
                'category_id'=>$request->pcat,
                'user_id'=>auth()->user()->id

            ]
        );

        if($request->ptag)
        {
            $post->tags()->attach($request->ptag);
        }
        session()->flash('success','New Post: '.$request->Title.' has been added');
        return redirect(route('Posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $Post)
    {
        //
        return view('Posts.show')->with('post',$Post)->with('categories',Category::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $Post)
    {
        //
      //  dd(Category::find($Post->id)->name);
       // return view('Posts.create')->withPost($Post);
     // return view('Posts.create',['post'=>$Post,'categories'=>Category::find($Post->id)]);
      return view('Posts.create')->with('post',$Post)->with('categories',Category::all())->with('tags',Tag::all());

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $Post)
    {
        //
        $data=$request->only(['Title','pcontent','pdesc']);

        if($request->hasFile('pimage'))
        {
            Storage::disk('public')->delete($Post->iamge);
            $pimage=$request->pimage->store('pimages','public');
            $data['image']=$pimage;
        }

        if($request->ptag)
        {
            $Post->tags()->sync($request->ptag);
        }


        $Post->update($data);

            // if($request->ptags)
            //     {

            //     }

        session()->flash('success','Post: '.$request->Title.' has been updated');
        return redirect(route('Posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //this way will not work because $post only have the not trashed method

        //  if($Post->trashed())
        //    {
         //   $Post->forceDelete();
           // session()->flash('success',' Post: '.$Post->Title.' has been deleted');
        // }
        // else
        // {
        //     $Post->delete();
        //     session()->flash('success',' Post: '.$Post->Title.' has been trashed');

        // }

//-----------------------------------------
        $post=Post::withTrashed()->where('id',$id)->first();

     if($post->trashed())
           {
           $post->forceDelete();
           Storage::delete($post->pimage);
         //  Storage::disk('puplic')->delete($post->pimage);
           session()->flash('success',' Post: '.$post->Title.' has been deleted');
        }
        else
        {
            $post->delete();
            session()->flash('success',' Post: '.$post->Title.' has been trashed');

        }
        return redirect(route('Posts.index'));

    }
    public function trashed()
    {
        $trashed=Post::onlyTrashed()->get();
       // return view('Posts.index')->with('posts',$trashed);
        return view('Posts.index')->withposts($trashed);

    }
    public function restore($id)
    {
        Post::withTrashed()->where('id',$id)->restore();
        session()->flash('success',' Post: '.Post::find($id)->Title.' has been restored');
        return redirect(route('Posts.index'));

    }

}
