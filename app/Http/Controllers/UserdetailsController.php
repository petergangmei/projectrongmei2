<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\storage;
use App\User;
use App\Profileimage;

use DB;
class UserdetailsController extends Controller
{

	public function uploadprofile_img(Request $request){

	$this->validate($request, [
		'profile_pic'=>'required',
		'profile_pic'=> 'image|nullable|max:1999'
	]);
			$u_id = auth()->user()->id;
			$u_name = auth()->user()->name;

		     // handle file upload
	     if($request->hasFile('profile_pic')){
	        //Get Filename with the extentionn
	        $filenameWithExt = $request->file('profile_pic')->getClientOriginalName();
	        // Get just file name
	        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
	        // Get just ext
	        $extension = $request->file('profile_pic')->getClientOriginalExtension();
	        //file name to store

	        $fileNameToStore = $filename.'_'.auth()->user()->id.'_'.time().'.'.$extension;
	        //upload image
	        $path = $request->file('profile_pic')->storeAs('public/profile_image/'.$u_id.'/', $fileNameToStore);
	     }else{
	        $fileNameToStore = 'nofile';
	     }

	     // DB::table('users')->where('id', $u_id)->update('profile_image', $fileNameToStore);
	     $post = User::find($u_id);
	     $post->profile_image = $request->input('profile_pic');
	     // if($request->hasFile('cover_image')){
	        $post->profile_image = $fileNameToStore;
	     // }
	     $post->save();

			 DB::table('comments')
            ->where('user_id', auth()->user()->id)
            ->update(['user_image' => $fileNameToStore]);

			 // add profile image to user_profile_img table
			DB::table('user_profile_img')->insert([ ['profile_image' => $fileNameToStore, 'user_id' => $u_id] ]);

    	return redirect('/dashboard')->with('success','Post created!');
	}
}
