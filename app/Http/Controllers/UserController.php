<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;

class UserController extends Controller
{

    public function mypage(User $user){
        $posts = Post::simplePaginate(10);
        return view('users.mypage',compact('posts','user'));
    }

    
    public function userInfoEdit(User $user){
        return view('users.userInfoEdit')->with('user', $user);
    }
    

    public function userInfoUpdate(Request $request, User $user) {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect('/');
    }
    
}  