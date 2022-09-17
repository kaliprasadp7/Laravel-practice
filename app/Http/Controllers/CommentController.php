<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use Auth;
use Validator;

class CommentController extends Controller
{
    public function create($id,Request $request)
    {

        $post = Post::where('id', $id)->first();

        if($post){
            $validator = Validator::make($request->all(),[
                'message'=>'required|max:200'
            ]);

            if($validator->fails()){
                return response()->json([
                    'message'=>'Validation error',
                    'errors'=>$validator->messages()
                ],422);
            }
        // dd($request->user()->id);

            $comment=Comment::create([
                'message'=>$request->message,
                'post_id'=>$post->id,
                'user_id'=>$request->user()->id
            ]);

            $comment->load('user');
            return response()->json([
                'message'=>'Comment successfully created',
                'data'=>$comment
            ]);

        }

    }

}

