@extends('layouts.app')
@section('content')

<!-- main container -->
<div class="container-fluid bgimg1">
	<div class="col-md-2">
		side
	</div>
	<div  style=" background-color: ;  min-height: 660px;" class="col-md-8  border-black">
		<h3 style="color:white;">News feed</h3>
		<!-- show recent posts -->
		@if(count($posts) >0)
			@foreach($posts as $post)
			<a href="/post-id-{{ $post->id }}">
			<div class="border-black cursor-pointer" style="width: 260px; max-height: 365px; min-height: 100px; float: left; margin: 5px 5px; ">

				    <div class="panel-body bg-white" style="padding: 5px;"><b>{{ $post->user_name }}</b> <small>{{ $post->created_at }}</small></div>
				    <div class="panel-body bg-white" style=" height: 150px;">{{ str_limit($post->post,'100') }}</div>
				    <div class="panel-footer" style="margin-botttom: ; position: ;">Likes, hot and share</div>
			</div>
			</a>

						
			@endforeach
		@else
		<p>No recent post</p>
		@endif
		<!-- show recent posts ends -->

		<div class="text-center">
			{!! $posts->links(); !!}
		</div>

	</div>
	<div class="col-md-0">
		
	</div>
	<div class="col-md-2">
		ends
	</div>


</div>
<!-- main container end -->


@endsection
