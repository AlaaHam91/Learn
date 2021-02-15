<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\User;
use App\Category;

class DashboredController extends Controller
{
    //
    public function index()
    {
        return view('Dashbored.index',[
            'posts_count'=>Post::all()->count(),
            'categories_count'=>Category::all()->count(),
            'users_count' =>User::all()->count()
        ]);
    }
}
