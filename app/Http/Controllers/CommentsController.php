<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\storage;
use App\Comment;
use DB;

class CommentsController extends Controller
{

    public function list(request $request){
        return $request->all();
        }

    public function postcomment(Request $request){

		$u_id = auth()->user()->id;
		$u_name = auth()->user()->name;

    	$post =  new comment;
    	$post->comment = $request->comment;
    	$post->user_image = $request->user_img;
    	$post->post_id = $request->post_id;
    	$post->post_type = 'video';
    	$post->user_id = $u_id;
    	$post->user_name = $u_name;
    	$post->save();
    	return $u_name;
    }

    public function postcomment2(Request $request){

        $u_id = auth()->user()->id;
        $u_name = auth()->user()->name;

        $post =  new comment;
        $post->comment = $request->input('comment');
        $post->user_image = $request->input('user_img');
        $post->post_id = $request->input('post_id');
        $post->post_type = 'video';
        $post->user_id = $u_id;
        $post->user_name = $u_name;
        $post->save();
        return redirect('/post-id-'.$request->input('post_id'))->with('success','Comment Posed!');
    }

    public function deleteComment(Request $request){

        $u_id = auth()->user()->id;
            $post_id = DB::table('comments')->where('id', $request->comment_id)->first();
           $p_id = $post_id->post_id; 

         if(auth()->user()->id != $post_id->user_id){
        return 5323;
        } 
          $comment = DB::table('comments')->where('id', $request->comment_id)->delete();
        // if($post->post_audio != 'nofile'){
        //     // delete the image file
        //     Storage::delete('public/audio_posted/'.$u_id.'/'.$post->post_audio);
        // }

     return 'deleted';
    }

    public function commenttwodelete($id){

        $u_id = auth()->user()->id;
            $post_id = DB::table('comments')->where('id', $id)->first();
           $p_id = $post_id->post_id; 

         if(auth()->user()->id != $post_id->user_id){
        return redirect('/')->with('error', 'Unauthorize User');
        } 
          $comment = DB::table('comments')->where('id', $id)->delete();

     return redirect('/post-id-'.$p_id)->with('success', 'Video Deleted!');
    }

    public function WithIMGcommentdelete($id){

        
        $u_id = auth()->user()->id;
            $post_id = DB::table('comments')->where('id', $id)->first();
           $p_id = $post_id->post_id; 

         if(auth()->user()->id != $post_id->user_id){
        return redirect('/')->with('error', 'Unauthorize User');
        } 
          $comment = DB::table('comments')->where('id', $id)->delete();

     return redirect('/post-id-'.$p_id)->with('success', 'Video Deleted!');

    }


    public function commentReport($id){
        return 23;
    }
}
