<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function readPost($id){
        return Post::findOrFail($id);
    }
    public function createPost(Request $request){
        $data = $request->all();

        try{
            $post = new Post();
            $post->post_photo_path = $data['post_photo_path'];
            $post->caption = $data['caption'];

            $post->save();
            $status = "success";
            return response()->json(compact('status', 'post'),200);
        }catch(\Throwable $th){
            $status = 'failed';
            return response()->json(compact('status', 'th'),401);
        }
    }

    public function deletePost($id){
        $post = Post::findOrFail($id);
        $post -> delete();

        $status = "delete status";
        return response()->json(compact('status'),200);
    }
}
