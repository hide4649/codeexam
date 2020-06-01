<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    
    public function index(){
        return view('posts.index');
    }


    public function store(Request $request){
        $restaurant_name = $request->input('restaurant_name');
        $db = Post::select('restaurant_name')->where('restaurant_name',$restaurant_name)->get();
      if(is_null($db)){
        $post = new Post;
        $post->user_id = Auth::id();
        $post->restaurant_name = $request->restaurant_name; 
        $post->restaurant_intro_short = $request->restaurant_intro_short; 
        $post->restaurant_intro_long = $request->restaurant_intro_long; 
        $post->restaurant_image = $request->restaurant_image; 
        $post->restaurant_address = $request->restaurant_address; 
        $post->restaurant_access_line_station = $request->restaurant_access_line_station; 
        $post->restaurant_access_line_station_walk = $request->restaurant_access_line_station_walk;  
        $post->restaurant_tell = $request->restaurant_tell; 
        $post->restaurant_opentime_holiday = $request->restaurant_opentime_holiday; 
        $post->restaurant_budget = $request->restaurant_budget;  
        $post->restaurant_credit_card = $request->restaurant_credit_card; 
        $post->restaurant_e_money = $request->restaurant_e_money; 
        $post->restaurant_url = $request->restaurant_url;
        
        $post->save();
        return response()->json(['message' => '保存完了しました']);
      }else{
        return response()->json(['message' => 'もうすでに保存しています']);
      }


    }


    public function destroy(Post $post) {
        $post->delete();
        $id = $post->user_id;
        return redirect()->route('mypage',$id);
    }


    public function search(Request $request, User $user){
        $search = $request->search;
        $posts = Post::orwhere('restaurant_name','like',"%{$search}%")->orWhere('restaurant_intro_short','like',"%{$search}%")->orWhere('restaurant_intro_long','like',"%{$search}%")->orWhere('restaurant_image','like',"%{$search}%")->orWhere('restaurant_address','like',"%{$search}%")->orWhere('restaurant_access_line_station','like',"%{$search}%")->orWhere('restaurant_access_line_station_walk','like',"%{$search}%")->orWhere('restaurant_tell','like',"%{$search}%")->orWhere('restaurant_opentime_holiday','like',"%{$search}%")->orWhere('restaurant_budget','like',"%{$search}%")->orWhere('restaurant_credit_card','like',"%{$search}%")->orWhere('restaurant_e_money','like',"%{$search}%")->orWhere('restaurant_url','like',"%{$search}%")->where('user_id',$user->id)->paginate(10);

        $search_result = '「'.$search.'」'.'の検索結果'.$posts->total().'件';

        return view('users.search_result',compact('posts','search_result','search'))->with('user', $user);
    }

}