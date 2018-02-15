<?php

namespace App\Http\Controllers;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_photos = DB::table('posts')->where('user_id', auth()->user()->id )->where('post_type', 'image')->orderBy('updated_at', 'DESC')->paginate(3);
        $user = DB::table('posts')->where('user_id', auth()->user()->id )->where('post_type', 'image')->orderBy('updated_at' , 'DESC')->get();
        $profile_img = DB::table('user_profile_img')->where('user_id' , auth()->user()->id)->orderBY('updated_at', 'DESC')->get();
        // $user_id = auth()->user()->id;
        // $user = User::find($user_id);
        // $posts = Post::all();
        return view('profile/dashboard')->with('user_photos', $user_photos)->with('posts', $user)->with('profile_img_his', $profile_img);
    }

    public function myvideos(){

        // $user_photos = DB::table('posts')->where('user_id', auth()->user()->id)->where('post_type', 'video')->orderBy('updated_at', 'DESC')->paginate(3);

        // $user = DB::table('posts')->where('user_id', auth()->user()->id)->where('post_type', 'video')->orderBy('updated_at' ,' DESC')->get();

        $ads = DB::table('posts')->where('post_type', 'video')->where('ads', 'main_ads')->orderBy('updated_at' ,' DESC')->get();

        $hot = DB::table('posts')->where('post_type', 'video')->where('user_id', auth()->user()->id)->orderBy('updated_at' ,' DESC')->get();

        $videos = DB::table('posts')->where('post_type', 'video')->orderBy('updated_at' ,' DESC')->get();


        return view('profile/myvideos')->with('videos', $videos)->with('ads_', $ads)->with('hotVids_', $hot);
    }

    public function myaudios(){

        $user_photos = DB::table('posts')->where('user_id', auth()->user()->id)->where('post_type', 'audio')->orderBy('updated_at', 'DESC')->paginate(3);

        $user = DB::table('posts')->where('user_id', auth()->user()->id)->where('post_type', 'audio')->orderBy('updated_at' ,' DESC')->get();

        return view('profile/myaudios')->with('user_photos', $user_photos)->with('posts', $user);
    }


}
