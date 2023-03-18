<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostReactionRequest;
use App\Models\Like;
use App\Models\Post;
// use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')->get();
        
        $data = collect();
        foreach ($posts as $post) {
            $data->add([
                'id'          => $post->id,
                'title'       => $post->title,
                'description' => $post->description,
                'tags'        => $post->tags,
                'like_counts' => $post->likes->count(),
                'created_at'  => $post->created_at,
            ]);
        }
        return response()->json([
            'data' => $data,
        ]);
    }

    public function toggleReaction(PostReactionRequest $request)
    {
        // Log::debug("USER ID". auth()->id());
        
        $post = Post::find($request->post_id);
        if(!$post) {
            return response()->json([
                'status' => 404,
                'message' => 'Post not found'
            ]);
        }
        
        if($post->author_id == auth()->id()) {
            return response()->json([
                'status' => 500,
                'message' => 'You cannot like your post'
            ]);
        }
        
        $like = Like::where('post_id', $request->post_id)->where('user_id', auth()->id())->first();
        // Log::debug("LIKE => $like");
        
        if(!empty($like)){
            if($like && $like->post_id == $request->post_id && $request->like) {
                return response()->json([
                    'status' => 500,
                    'message' => 'You already liked this post'
                ]);
            }elseif($like && $like->post_id == $request->post_id && !$request->like) {
                $like->delete();
                
                return response()->json([
                    'status' => 200,
                    'message' => 'You unlike this post successfully'
                ]);
            }
        }else{
            Like::create([
                'post_id' => $request->post_id,
                'user_id' => auth()->id()
            ]);
            
            return response()->json([
                'status' => 200,
                'message' => 'You like this post successfully'
            ]);
        }
    }

}
