<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PagesController extends Controller
{	

    public function __construct()
    {
        $this->middleware('auth', ['except' => array('videos', 'about', 'index', 'posts', 'viewPost')]);
    }

    public function index(){

	    $user = DB::table('posts')->where('post_type', 'image')->where('post_status', 'hot')->orderBy('updated_at' ,' DESC')->get();
	    $user_video = DB::table('posts')->where('post_type', 'video')->where('post_status', 'hot')->orderBy('updated_at' ,' DESC')->get();

	    return view('pages/home_page')->with('posts', $user)->with('videos', $user_video);

    }
    public function about(){
    	return view('pages/about');
    }

    public function posts(){
        $posts = DB::table('posts')->where('post_type', 'image')->orderBy('updated_at', 'DESC')->paginate(9);
        
    	return view('pages/news_page')->with('posts', $posts);
    }

    public function viewPost($id){
        $posts = DB::table('posts')->where('post_type', 'image')->where('id' , $id)->orderBy('updated_at', 'DESC')->get();
        
        foreach ($posts as $vid ) {
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

        return view('news/post_show')->with('datas', $posts)->with('comments', $comments)->with('commentsCount', $commentsCount)->with('user_detail', $user_detail);
    }


    public function videos(){
	    $ads = DB::table('posts')->where('post_type', 'video')->where('ads', 'main_ads')->orderBy('updated_at' ,' DESC')->get();

	    $hot = DB::table('posts')->where('post_type', 'video')->where('post_status', 'hot')->orderBy('updated_at' ,' DESC')->get();

	    $videos = DB::table('posts')->where('post_type', 'video')->orderBy('updated_at' ,' DESC')->get();


    	return view('pages/videos_page')->with('videos', $videos)->with('ads_', $ads)->with('hotVids_', $hot);
    }

    public function audios(){

    	return 123;
    }
}
