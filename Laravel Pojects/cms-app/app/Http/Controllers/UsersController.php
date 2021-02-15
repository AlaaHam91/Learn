<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Http\Requests\ProfileRequest;
class UsersController extends Controller
{
    //
    public function index()
    {
        return view('Users.index')->with('users',User::all());
    }
    public function create()
    {
        return view('Users.create');
    }
    public function makeAdmin(User $user)
    {
       $user->role='admin';
       $user->save();
       return redirect(route('Users.index'));

    }
    public function edit(User $user)
    {

        return view('Users.profile')->with('user',$user)->with('profile',$user->profile);
    }
    public function update(ProfileRequest $request,User $user)
    {

        $profile=$user->profile;

        //  $data=$request->all();
         $data=['name'=>$request->pname,'about'=>$request->pabout];
        if($request->hasFile('avatar'))
        {
            $image=$request->avatar->store('profiles','public');
            $data['picture']=$image;
        }
        $profile->update($data);
        session()->flash('success','Profile: '.$profile->name.' has been updated');
        return redirect(route('home'));
    }
}
