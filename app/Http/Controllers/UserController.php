<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;
use Carbon\Carbon;

class UserController extends Controller
{

    public function mypage(User $user){
        $user->load('posts');
        return view('users.mypage')->with('user',$user);
    }

    
    public function editprofile(User $user){
        return view('users.editprofile')->with('user', $user);
    }
    

    public function profileUpdate(Request $request, User $user) {
        $exist = User::where('image', $user->image)->exists();
        if($exist){
            \File::delete('public/proflieimage/'. $user->image);
            if($request->file('image')) { 
                $user->name = $request->name;
                $image = $request->file('image');
               
                $filename = $image->store('public/proflieimage');
    
                $user->image = basename($filename);
                $user->save();
            }else{
                $user->name = $request->name;
                $user->save();
            }
        }else{
            if($request->file('image')) { 
                $user->name = $request->name;
                $image = $request->file('image');
               
                $filename = $image->store('public/proflieimage');
    
                $user->image = basename($filename);
                $user->save();
            }
        }

        return view('users.mypage')->with('user',$user);
        
    }
    
}  