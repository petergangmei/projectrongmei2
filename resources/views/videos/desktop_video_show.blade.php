@extends('layouts.app2')
@section('content')
<!-- background-color  -->
<div style="background-color: white;">
	<!-- first containder  -->
	<div style="background-color: white;"  class="container-fluid">
		<!-- row one -->
		<div class="row">
				<!-- bigger col start -->
				<div class="col-md-8 col-xs-12 border-black">

				<!-- wrapper starts -->
					 <div class="wrapper">
				        <!-- Sidebar Holder -->
				            <nav id="sidebar">
				                <div class="sidebar-header text-center">
									<img style="height: 140px; width: 220px; margin: 5px -50px; " class="" src="/storage/default-images/p2.jpg">
				                </div>
				                <div>
			                        <a href="/videos" class="btn btn-default btn-block">Home</a>
			                        @guest
			                        @else
			                        <a href="/myvideos" class="btn btn-default btn-block">My videos</a>
			                        @endguest
			                        <a href="/history" class="btn btn-default btn-block">History</a>
				           		</div>
				            </nav>
				            <!-- sidebar holder end -->

				            <!-- Page Content Holder -->
				            <div id="content">
				            	<span id="sidebarCollapse" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>

							<!-- video container starts here -->

<div style=" width: 100%;" class="row border-black">
					@if (count($videos) >0)
						@foreach($videos as $video)
							<title>{{ $video->post_title }}</title>

							  <div class="panel padding-lg" style="width: 100%; float: left; margin-right: 15px;">
								    <div class="panel-">
								    	<video  autoplay preload="metadata" style="border:1px solid skyblue; width: 100%; max-height:400px;"  poster="/storage/video_thumbnail/{{ $video->user_id }}/{{ $video ->video_thumb }}"   controls >
										  <source src="/storage/video_posted/{{ $video->user_id }}/{{ $video ->post_video }}" type="video/mp4">
										</video>
								    </div>
									    <!-- video title -->
									    <h3>{{ str_limit($video->post_title,'50')}}</h3>
									    <!-- video title ends -->

									 <!-- attributes of video -->
									    <div style="width: 100%; border-bottom:1px double silver;" class="text-right border-black1float-right">
										    <span style="float: left;" class=''>200 Views</span>
										    <span style="float: ; font-size: 18px;" class="btn glyphicon glyphicon-thumbs-up">50</span>
										    <span style="float: ; font-size: 18px;" class="btn glyphicon glyphicon-thumbs-down">0</span>
										    <span style="float: ; font-size: 18px;" class="btn glyphicon glyphicon-share-alt">SHARE</span>
										    <span style="float: ; font-size: 18px;" class="btn glyphicon glyphicon-option-vertical"></span>
										 </div>
										 <br>
										 <div class="border-black text-left">
										 	<!-- subscrib button -->
										 	<button style="border:1px solid blue; float:right; float: right; width: 100px; height: 35px; background-color: blue; color: white;">Subscribe
										 	</button>
										 	<!-- subscribe button ends here -->
											<!-- video author detail -->
											<div class="padding-md">
												<img style="height: 70px; width: 70px; margin: 5px 5px; float: left;" class="" src="/storage/profile_image/{{ $user_detail->id }}/{{ $user_detail->profile_image }}">

												<b><h4 style="color: black">{{ $user_detail->name }}</h4></b>
												<small><p>publish on {{{ $video->created_at }}}</p></small>
												<?php $post_id = $video->id; ?>

											</div>
											<!-- video author detail ends -->
										 </div>
									<!-- attribuite of video ends -->

								 </div>
							<!-- line break after all the videos information -->
							 <hr>
						@endforeach
					@else
					<p>No Trainding vedio right now</p>
					@endif
					<!-- div for comment -->
					<div class="comment">
							<!-- add comment div -->
							<div class="padding-lg" style="border-bottom:0px solid silver; padding-left: ; padding-right: ;">

								<div class="row">
									<!-- <div class="col-md-1"></div> -->
									<div class="col-md-8"><h4 ><span style="font-size: 1.3em;">{{ $commentsCount->count() }}</span> <samll> Comments</samll></h4></div>
									<div class="col-md-4"><!-- -2- --></div>
								</div>
								<!-- row for comment div -->
								<div class="row">
									<div class="col-md-1 col-sm-2 text-center">
										@guest
										<img style="height: 60px; width: 60px; border-radius: 100%; margin: -5px 0px;" class="hidden-xs" src="/storage/default-images/ava.jpg">
										@else
										<?php $userId_path =  auth()->user()->name; ?>
										<img style="height: 60px; width: 60px; border-radius: 100%; margin: -5px 0px;" class="hidden-xs" src="/storage/profile_image/{{ auth()->user()->id }}/{{ auth()->user()->profile_image }}">
										@endguest
										<br>
									</div>
									@guest
									<?php $uimg = $user_detail->profile_image  ?>
									@else
									<?php $uimg = auth()->user()->profile_image;  ?>

									@endguest
									<div class="col-md-11 border-black col-sm-10 col-xs-12">
		                            <input type="hidden" name="user_img" id="user_img" value="<?php echo $uimg ?>">
		                            <input type="hidden" name="post_id" id="user_id" value="<?php echo $post_id ?>">
			                        {{ Form::textarea('comment', '', ['id'=>'showme','style'=>'height:30px; width:99%; border:0px solid black; border-bottom:1px solid silver; padding:5px;', 'class'=>'c_textarea', 'placeholder' => 'Add comment'] )}}
		                            @guest
		                            @else
		                            <button id="cBtn" class="csshide custom-btn float-left">Comment</button>
		                            @endguest
		                             <small class="csshide">
		                             	@guest
		                             	@else
		                             	as
		                             	@endguest
		                             	<b>
		                             	@guest
		                             	Need to login. <span  class="cursor-pointer glyphicon glyphicon-question-sign " data-toggle="popover" title="Why Need to login?" data-content="It's needed to log in to your account to varify that the comment is from an authorized user."></span><br> <a href="/login" data-toggle="popover"  data-content="Click here to go to the login page.">Click here</a>
		                             	@else
		                             	<?php
		                           			echo  auth()->user()->name;
		                             	?>
		                             	@endguest
		                             </b></small>
									</div>
								</div>
								<!-- row for comment div -->
					</div>
						<!-- add comment div ends here-->
						<!-- display comment div start here -->
						<div class="border-black padding-lg">
							@if(count($comments) >0)
							@foreach($comments as $comment)
								<!-- row for comment display div -->
								<div class="row">
									<div class="col-md-1 col-xs-1   text-right">
										<img src="/storage/profile_image/{{ $comment->user_id }}/{{ $comment->user_image }}" class="hidden-xs" style="border:1px solid black; border-radius: 100%; height: 50px; width: 50px;"><br>
									</div>
										<div class="col-md-10 col-xs-10 border-black" style="min-height: 50px; background-color: white;">

											<div style="border-radius: 0px; padding: 0px; border-bottom:0px solid silver;">

												<small><b>{{ $comment->user_name }}</b></small><br>
												{{ $comment->comment }}
											</div><br><br>
										</div>
										<div class="col-md-1 col-xs-11">
											@guest
											<span class="dropdown ">
                                          		<span class=""  data-toggle="dropdown">
                                              		<span class="glyphicon glyphicon-option-vertical cursor-pointer"></span>
                                           		 </span>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                   {!! Form::open(['action' => ['CommentsController@commentReport',  $comment->id ], 'method'=> 'POST'])!!}
                                                      {{ Form::hidden('_method','DELETE') }}
                                                      {{ Form::submit('Report', ['class' => 'btn btn-block', 'style' => 'float:']) }}
                                                    {!! Form::close() !!}
                                                    </li>
                                                </ul>
                                        	</span>
											@else
											<?php if($comment->user_id == auth()->user()->id){ ?>
												<span class="dropdown ">
                                          		<span class=""  data-toggle="dropdown">
                                              		<span class="glyphicon glyphicon-option-vertical cursor-pointer"></span>
                                           		 </span>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#" class="btn btn-block">Edit</a></li>
                                                    <li>
                                                   {!! Form::open(['action' => ['CommentsController@deleteComment',  $comment->id ], 'method'=> 'POST'])!!}
                                                      {{ Form::hidden('_method','DELETE') }}
                                                      {{ Form::hidden('user_id', auth()->user()->id) }}
                                                      {{ Form::submit('Delete Post', ['class' => 'btn btn-block', 'style' => 'float:']) }}
                                                    {!! Form::close() !!}
                                                    </li>
                                                </ul>
                                        	</span>
											<?php
											}else{
											?>
											<span class="dropdown ">
                                          		<span class=""  data-toggle="dropdown">
                                              		<span class="glyphicon glyphicon-option-vertical cursor-pointer"></span>
                                           		 </span>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                   {!! Form::open(['action' => ['CommentsController@commentReport', - $comment->id ], 'method'=> 'POST'])!!}
                                                      {{ Form::hidden('_method','DELETE') }}
                                                      {{ Form::submit('Report', ['class' => 'btn btn-block', 'style' => 'float:']) }}
                                                    {!! Form::close() !!}
                                                    </li>
                                                </ul>
                                        	</span>

											<?php 	} ?>

                                        	@endguest
										</div>
								</div>
								<!-- row for comment display div end-->
							@endforeach
							@else
							<p>No comment in this video</p>
							@endif
						</div>
						<!-- display comment div ends here -->
					</div>
					<!-- div for comment ends here -->
				</div>
				<!-- video container ends here -->


				            </div>
				            <!-- page content holrder end -->
				    </div>
				    <!-- wrapper ends -->

				</div>
				<!-- bigger col end -->
			<!-- related videos -->
			<div class="col-md-3 col-xs-12 border-black padding-md">
				<!-- div row second starts -->
				<!-- <div class="row"> -->
				<h3>Related videos</h3>
					<hr>
					<div class="row">
					@if (count($related_videos) >0)
						@foreach($related_videos as $video)
								<div style="height: 150px;  text-align: ;" class="col-md-7 col-xs-6 border-black">
								 	<!-- link to go video showw page starts-->
								 	<a href="/video-id-{{ $video->id }}"  class="cursor-pointer ">

									  <!-- <div class="panel panel-default" style="width: 100%; float: left; margin-right: 15px;"> -->
								    	<video   onmouseover="autoplay_start(this)" onmouseout="autoplay_stop(this)"  preload="metadata" style="border:1px solid silver; width: 100%; height:150px;" poster="/storage/video_thumbnail/{{ $video->user_id }}/{{ $video ->video_thumb }}"   >
										  <source src="/storage/video_posted/{{ $video->user_id }}/{{ $video ->post_video }}" type="video/mp4">
										</video>
									  <!-- </div> -->
								</div>
								<div style="height: 150px; text-align: ; padding: 10px;"  class="col-md-5 col-xs-6 border-black">
									<div  class="padding-">
										<!-- related video title  -->
										<b style="color: black; font-size: 16px; " class="padding-md" title="{{ str_limit($video->post_title,'150')}}">{{ str_limit($video->post_title,'45')}}</b>
										<!-- related video title ends here -->
										</a>
										<!-- link to go video show page ends -->
										<br>
										<!-- view of the video  -->
										<span style="float: ;" class=''>200 Views</span>
										<!-- vide of the video ends here -->
										<br>
										<!-- link to go user profile -->
										<a href="/user-id-{{ $video->user_id }}"><small class="padding-md"><b>{{ $user_detail->name }}</b></small>
										</a>
										<!-- link to go user profile ends here -->

									</div>
								</div>
							@endforeach
						@else
						<p>No Related videos</p>
					@endif
					</div>
				<!-- </div> -->
				<!-- div row second ends -->
			</div>
		</div>
		<!-- row  one ends -->
	</div>
	<!-- first container ends -->


</div>
<!-- background-color ends -->

 <!-- Bootstrap Js CDN -->
 <script type="text/javascript">
		 
     $(document).ready(function () {
         $('#sidebarCollapse').on('click', function () {
             $('#sidebar').toggleClass('active');
         });
     });
 </script>
@endsection
