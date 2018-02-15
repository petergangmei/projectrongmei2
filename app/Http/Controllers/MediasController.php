<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\storage;
use App\Post;
use DB;

class MediasController extends Controller
{

   
   public function search($key){
      return $key;
      $post = Post::search($key)->get();
   }

   public function videoShow($id){
   	$video =  DB::table('posts')->where('post_type', 'video')->where('id', $id)->orderBy('updated_at', 'DESC')->get();
   	$video_name = DB::table('posts')->where('post_type', 'video')->where('id', $id)->first();
   	$vid_name  = substr($video_name->post_title,0,-6);
   	$vid_short = $vid_name.'%';

   	foreach ($video as $vid ) {
   	$related_video =  DB::table('posts')->where('post_type', 'video')->where('post_title', 'like', $vid_short )->where('id', '!=', $id)->orderBy('updated_at', 'DESC')->get();
   	$user_detail = DB::table('users')->where('id', $vid->user_id)->first();
   	}

      $comments = DB::table('comments')->where('post_id', $id)->orderBy('created_at', 'DESC')->get();

      $commentsCount = DB::table("comments")
      ->where("post_type", "video")
      ->where("post_id", $id)
       // ->select(DB::raw("COUNT(*) as count_row"))
       ->orderBy("created_at")
       // ->groupBy(DB::raw("year(created_at)"))
       ->get();
// print($data->count());
   	return view('videos/video_show')->with('videos', $video)->with('related_videos', $related_video)->with('user_detail', $user_detail)->with('comments', $comments)->with('commentsCount', $commentsCount);
   	// return $id;
   }
}
