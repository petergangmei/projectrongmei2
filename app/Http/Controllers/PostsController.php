<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\storage;
use App\Post;
use DB;

class PostsController extends Controller
{	

	

	public function store(Request $request){

	$this->validate($request, [
		'post'=>'required',
		'post_image'=> 'image|nullable|max:1999'
	]);
			$u_id = auth()->user()->id;
			$u_name = auth()->user()->name;

		     // handle file upload
	     if($request->hasFile('post_image')){
	        //Get Filename with the extentionn
	        $filenameWithExt = $request->file('post_image')->getClientOriginalName();
	        // Get just file name
	        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
	        // Get just ext
	        $extension = $request->file('post_image')->getClientOriginalExtension();
	        //file name to store

	        $fileNameToStore = $filename.'_'.auth()->user()->id.'_'.time().'.'.$extension;
	        //upload image
	        $path = $request->file('post_image')->storeAs('public/images_posted/'.$u_id.'/', $fileNameToStore);
	     }else{
	        $fileNameToStore = 'nofile';
	     }

    	$post =  new Post;
    	$post->post = $request->input('post');
    	$post->post_type = $request->input('post_type');
    	$post->post_img = $fileNameToStore;
    	$post->user_id = $u_id;
    	$post->user_name = $u_name;
    	$post->audience = $request->input('audience');
    	$post->category = $request->input('category');
    	$post->save();
    	return redirect('/dashboard')->with('success','Post created!');
	}

	public function destroy($id){
		
		$u_id = auth()->user()->id;

		$post = Post::find($id);
		
         if(auth()->user()->id != $post->user_id){
        return redirect('/')->with('error', 'Unauthorize User');
        } 

        if($post->post_img != 'nofile'){
            // delete the image file
            Storage::delete('public/images_posted/'.$u_id.'/'.$post->post_img);
        }
        $post->delete();

     return redirect('/dashboard')->with('success', 'Post Remove');
	}


	//vid upload

		public function uploadvideo(Request $request){

		$this->validate($request, [
			'video_title' => 'required|max:191',
			'video_file'=>'required',
			'video_description'=>'required'
		]);
				$u_id = auth()->user()->id;
				$u_name = auth()->user()->name;

			     // handle file upload
		     if($request->hasFile('video_file')){
		        //Get Filename with the extentionn
		        $filenameWithExt = $request->file('video_file')->getClientOriginalName();
		        // Get just file name
		        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
		        // Get just ext
		        $extension = $request->file('video_file')->getClientOriginalExtension();
		        //file name to store

		        $fileNameToStore = $filename.'_'.auth()->user()->id.'_'.time().'.'.$extension;

		        //upload image
		        $path = $request->file('video_file')->storeAs('public/video_posted/'.$u_id.'/', $fileNameToStore);
		     }else{
		        $fileNameToStore = 'nofile';
		     }

		     		     if($request->hasFile('video_thumb')){
		        //Get Filename with the extentionn
		        $filenameWithExt2 = $request->file('video_thumb')->getClientOriginalName();
		        // Get just file name
		        $filename2 = pathinfo($filenameWithExt2, PATHINFO_FILENAME);
		        // Get just ext
		        $extension2 = $request->file('video_thumb')->getClientOriginalExtension();
		        //file name to store

		        $fileNameToStore2 = $filename2.'_'.auth()->user()->id.'_'.time().'.'.$extension2;

		        //upload image
		        $path = $request->file('video_thumb')->storeAs('public/video_thumbnail/'.$u_id.'/', $fileNameToStore2);
		     }else{
		        $fileNameToStore2 = 'nofile';
		     }

	    	$post =  new Post;
	    	$post->post = $request->input('video_description');
	    	$post->post_type = $request->input('post_type');
	    	$post->post_title = $request->input('video_title');
	    	$post->post_video = $fileNameToStore;
	    	$post->video_thumb = $fileNameToStore2;
	    	$post->user_id = $u_id;
    		$post->user_name = $u_name;
	    	$post->audience = $request->input('audience');
	    	$post->category = $request->input('category');
	    	$post->save();
	    	return redirect('/myvideos')->with('success','video posted!');
		}

		public function deletevideo($id){
			
				$u_id = auth()->user()->id;
				$u_name = auth()->user()->name;

				$post = Post::find($id);
				
		         if(auth()->user()->id != $post->user_id){
		        return redirect('/')->with('error', 'Unauthorize User');
		        } 

		        if($post->post_img != 'nofile'){
		            // delete the image file
		            Storage::delete('public/video_posted/'.$u_id.'/'.$post->post_video);
		        }
		        $post->delete();

		     return redirect('/myvideos')->with('success', 'Video Deleted!');
		}

		public function uploadaudio(Request $request){

				$this->validate($request, [
					'audio_title' => 'required|max:191',
					'audio_file'=>'required',
					'audio_description'=>'required'
				]);
					$u_id = auth()->user()->id;
					$u_name = auth()->user()->name;

				     // handle file upload
			     if($request->hasFile('audio_file')){
			        //Get Filename with the extentionn
			        $filenameWithExt = $request->file('audio_file')->getClientOriginalName();
			        // Get just file name
			        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
			        // Get just ext
			        $extension = $request->file('audio_file')->getClientOriginalExtension();
			        //file name to store

			        $fileNameToStore = $filename.'_'.auth()->user()->id.'_'.time().'.'.$extension;

			        //upload image
			        $path = $request->file('audio_file')->storeAs('public/audio_posted/'.$u_id.'/', $fileNameToStore);
			     }else{
			        $fileNameToStore = 'nofile';
			     }

		    	$post =  new Post;
		    	$post->post = $request->input('audio_description');
		    	$post->post_type = $request->input('post_type');
		    	$post->post_title = $request->input('audio_title');
		    	$post->post_audio = $fileNameToStore;
		    	$post->user_id = $u_id;
    			$post->user_name = $u_name;
		    	$post->audience = $request->input('audience');
		    	$post->category = $request->input('category');
		    	$post->save();
		    	return redirect('/myaudios')->with('success','video posted!');
				}


		public function deleteaudio($id){
			
				$u_id = auth()->user()->id;

				$post = Post::find($id);
				
		         if(auth()->user()->id != $post->user_id){
		        return redirect('/')->with('error', 'Unauthorize User');
		        } 

		        if($post->post_audio != 'nofile'){
		            // delete the image file
		            Storage::delete('public/audio_posted/'.$u_id.'/'.$post->post_audio);
		        }
		        $post->delete();

		     return redirect('/myaudios')->with('success', 'Video Deleted!');
		}


}
