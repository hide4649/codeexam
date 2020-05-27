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


    public function store(PostRequest $request){
          
        if($request->file('image')) {
            $post = new Post;
            $post->user_id = $request->user_id;
            $post->category_id = $request->category_id;
            $post->body = $request->body;
            $post->title = $request->title;
            
            $image = $request->file('image');
            $filename = $image->store('public/image');
            $post->image = basename($filename);

            $post->save();

        }elseif($request->file('image') === null){
            $post = new Post;
            $post->user_id = $request->user_id;
            $post->category_id = $request->category_id;
            $post->body = $request->body;
            $post->title = $request->title;
            $post->save();
        }


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