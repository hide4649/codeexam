<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;


class PostsController extends Controller
{
    
    public function index(){
        return view('posts.index');
    }

    public function show(Post $post){
        
        // $orderbys = Post::where('user_id', $post->user_id)->latest()->limit(3)->get();
        // $randoms = Post::where('user_id', $post->user_id)->inRandomOrder()->take(3)->get();
        // $comments = Comment::where('post_id',$post->id)->get();
        // return view('posts.show',compact('orderbys','randoms','comments'))->with('post',$post);
    
    }


    public function store(Request $request){
          
        $post = new Post;
        $post->user_id = $request->user_id;
        $post->restaurant_name = $request->restaurant_name;
        $post->restaurant_intro_short = $request->restaurant_intro_short;
        $post->restaurant_intro_long = $request->restaurant_intro_long;
        $post->restaurant_image = $request->restaurant_image;
        $post->restaurant_address = $request->restaurant_address;
        $post->access_line = $request->access_line;
        $post->access_station = $request->access_station;
        $post->restaurant_access_walk = $request->restaurant_access_walk;
        $post->restaurant_tell = $request->restaurant_tell;
        $post->restaurant_opentime = $request->restaurant_opentime;
        $post->restaurant_holiday = $request->restaurant_holiday;
        $post->restaurant_budget = $request->restaurant_budget;
        $post->restaurant_budget_lunch = $request->restaurant_budget_lunch;
        $post->restaurant_credit_card = $request->restaurant_credit_card;
        $post->restaurant_e_money = $request->restaurant_e_money;
        $post->restaurant_url = $request->restaurant_url;
        
        $post->save();


        return redirect('/');
    }


    public function destroy(Post $post) {
        
        $deleteimg = $post->image;
  
        if($deleteimg === null){
          $post->delete();  
         }
         else{
          \File::delete('public/image/'.$deleteimg);
          $post->delete();
         }
         return redirect('/');
    }


    public function search(Request $request){
        // dd($request->search);
        $search = $request->search;
        $posts = Post::select('id','title','image')->where('title','like',"%{$search}%")->orWhere('body','like',"%{$search}%")->paginate(3);

        $search_result = '「'.$search.'」'.'の検索結果'.$posts->total().'件';

        return view('posts.index',compact('posts','search_result','search'));
    }

}