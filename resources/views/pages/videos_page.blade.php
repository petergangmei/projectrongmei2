@extends('layouts.app2')
@section('content')
<title>Ruangmei | Vidoes</title>
<!-- 211C1A -->
<!-- 524D4C -->
<div style="background-color: #;" class="container-fluid">
	<div title="hey" style="background-color: #;" class="col-md-2 text-center">
		<div class="">
			
			<img style="height: 140px; width: 220px; margin: 5px -50px; " class="" src="/storage/default-images/p2.jpg">
		<a href="/videos" class="btn btn-default btn-block">Home</a>
		@guest
		@else
		<a href="/myvideos" class="btn btn-default btn-block">My videos</a>
		@endguest
		<a href="/videos" class="btn btn-default btn-block">History</a>
		<a href="/videos" class="btn btn-default btn-block">heh</a>
		</div>
	</div>
	<div class="col-md-10">
		<div class="row">
			<!-- content -->
			<div class="content height-lg text- border-black padding-lr">
				<!-- ads  -->
				<div class="content ads border-black1 border-radius-md">
					@if (count($ads_) >0)
						@foreach($ads_ as $ads)
							 <video id="adsVid"   preload="auto" style="width: 100%; height: 100%"  autoplay  muted>
							  <source src="/storage/video_posted/{{ $ads->user_id }}/{{ $ads ->post_video }}#t=5,20" type="video/mp4">
							</video>
						@endforeach
					@else
					<p>No ads available to show</p>
					@endif
				</div>
				<!-- ads end -->
				<br>
				<!-- traindig  -->
			<b style="color: white;">Trainding</b><br>

				<div style="min-height: 230px;  overflow-x: auto;" class="content border-black title-hot padding-lg">
					@if (count($hotVids_) >0)
						@foreach($hotVids_ as $hotVid)
							  <!-- <div class="" style="width: 1400px;"> -->
								<a href="/video-id-{{ $hotVid->id }}"  class="cursor-pointer">

								  <div class="panel panel-default padding-md" style="width: 250px; float: left; margin-right: 15px;">
								    <div class="panel-">
								    	<video class="Vids_" id="Vids_" value='1' onmouseover="autoplay_start(this)" onmouseout="autoplay_stop(this)"  preload="none" style="width: 240px; height: 180px;"  poster="/storage/video_thumbnail/{{ $hotVid->user_id }}/{{ $hotVid ->video_thumb }}" muted >
										  <source src="/storage/video_posted/{{ $hotVid->user_id }}/{{ $hotVid->post_video }}#t=2,10" type="video/mp4">
										</video>
								    </div>
								    <div class="panel-footer">
								    	<b>{{ str_limit($hotVid->post_title,'15')}}</b><br>
								   </a>
								    	<a href="/user-id-{{ $hotVid->user_id }}"><small style="color: gray;">{{ $hotVid->user_name }}</small></a>
								    </div>
								  </div>
								<!-- </div> -->
						@endforeach
					@else
					<p>No Trainding vedio right now</p>
					@endif
				</div>
				<!-- trainding end -->
				<br>
			
			<!-- traindig  -->
<!-- 				<b style="color: white;">Recommended</b><br>
					<div style="height: 230px;  overflow-x: auto;" class="content border-black title-hot padding-lg">
						@if (count($hotVids_) >0)
							@foreach($hotVids_ as $hotVid)
								  <div class="" style="width: 1500px;">
									  <a href=""  class="cursor-pointer">
									  <div class="panel panel-default" style="width: 150px; float: left; margin-right: 15px;">
									    <div class="padding-md"><b>{{ str_limit($hotVid->post_title,'15')}}</b></div>
									    <div class="panel-">
									    	<video preload="none" style="width: 150px; height: 90px;"   >
											  <source src="/storage/video_posted/{{ $hotVid->user_id }}/{{ $hotVid ->post_video }}#t=2,10" type="video/mp4">
											</video>
									    </div>
									    <div class="panel-footer">panel footer</div>
									  </div>
									  </a>
									</div>
							@endforeach
						@else
						<p>No Trainding vedio right now</p>
						@endif
					</div> -->
				<!-- trainding end -->


				
			</div>
			<!-- content end -->
		</div>
	</div>
</div>
@endsection