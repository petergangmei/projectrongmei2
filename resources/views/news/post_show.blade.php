@extends('layouts.app')
@section('content')

<div class="container-fluid">
	<div class="row">
	<div class="col-md-2"></div>
	<div class="col-md-8">

	<h3>Post view</h3>
	@foreach($datas as $data)

	<?php if($data->post_img == 'nofile'){ ?>
		<div class="panel panel-default">
		<div class="panel-heading">
		<b>{{ $data->user_name }} </b> {{ $data->created_at }}
		</div>
		<div class="panel-body">
		{{ $data->post }}
		</div>		
		<div class="panel-footer">
			Like, hot , share
		</div>
		<div class="comment">
			<!-- add comment div -->
			<div class="padding-lg" style="border-bottom:0px solid silver; padding-left: ; padding-right: ;">
					
				<div class="row">
					<!-- <div class="col-md-1"></div> -->
					<div class="col-md-8"><h4 ><span style="font-size: 1.3em;">{{ $commentsCount->count() }}</span> <samll> Comments</samll>
					</h4></div>
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
					<?php $post_id = $data->id; ?>
					<div class="col-md-11 border-black col-sm-10 col-xs-12">
                    {!! Form::open(['action'=>'CommentsController@postcomment2', 'method'=> 'POST']) !!}
                    <input type="hidden" name="user_img" value="<?php echo $uimg ?>">
                    <input type="hidden" name="post_id" value="<?php echo $post_id ?>">
                    {{ Form::textarea('comment', '', ['id'=>'showme','style'=>'height:30px; width:99%; border:0px solid black; border-bottom:1px solid silver; padding:5px;', 'class'=>'c_textarea', 'placeholder' => 'Add comment'] )}}   
                    @guest
                    @else
                    {{ Form::submit('Comment ', ['class'=>'csshide custom-btn float-left  ', 'id'=>'cBtn', 'style'=>'margin:5px 0px; display:;']) }}
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
                   {!! Form::close() !!}
					</div>
				 </div>
				<!-- row for comment div -->
			   </div>
			<!-- comment end -->
		  </div>

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
								<?php $post_id = $comment->post_id; ?>
									
									<span class="dropdown ">
                              		<span class=""  data-toggle="dropdown">
                                  		<span class="glyphicon glyphicon-option-vertical cursor-pointer"></span>
                               		 </span>
                                    <ul class="dropdown-menu">
                                        <li><a href="#" class="btn btn-block">Edit</a></li>
                                        <li>
                                       {!! Form::open(['action' => ['CommentsController@commenttwodelete',  $comment->id ], 'method'=> 'POST'])!!}

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
	<?php }else{ ?>

		<div class="panel panel-default">
			<div class="panel-heading">
			<b>{{ $data->user_name }} </b> {{ $data->created_at }}
			</div>
			<div class="panel-body">
				<img style="max-width: 100%; max-height: 500px;" src="/storage/images_posted/{{ $data->user_id }}/{{ $data->post_img }}"><br>
			{{ $data->post }}
			</div>		
			<div class="panel-footer">
				Like, hot , share
			</div>
			<!-- comment -->

		<div class="comment">
			<!-- add comment div -->
			<div class="padding-lg" style="border-bottom:0px solid silver; padding-left: ; padding-right: ;">
					
				<div class="row">
					<!-- <div class="col-md-1"></div> -->
					<div class="col-md-8"><h4 ><span style="font-size: 1.3em;">{{ $commentsCount->count() }}</span> <samll> Comments</samll>
					</h4></div>
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
					<?php $post_id = $data->id; ?>
					<div class="col-md-11 border-black col-sm-10 col-xs-12">
                    {!! Form::open(['action'=>'CommentsController@postcomment2', 'method'=> 'POST']) !!}
                    <input type="hidden" name="user_img" value="<?php echo $uimg ?>">
                    <input type="hidden" name="post_id" value="<?php echo $post_id ?>">
                    {{ Form::textarea('comment', '', ['id'=>'showme','style'=>'height:30px; width:99%; border:0px solid black; border-bottom:1px solid silver; padding:5px;', 'class'=>'c_textarea', 'placeholder' => 'Add comment'] )}}   
                    @guest
                    @else
                    {{ Form::submit('Comment ', ['class'=>'csshide custom-btn float-left  ', 'id'=>'cBtn', 'style'=>'margin:5px 0px; display:;']) }}
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
                   {!! Form::close() !!}
					</div>
				 </div>
				<!-- row for comment div -->
			   </div>
			<!-- comment end -->
		  </div>

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
								<?php $post_id = $comment->post_id; ?>

									
									<span class="dropdown ">
                              		<span class=""  data-toggle="dropdown">
                                  		<span class="glyphicon glyphicon-option-vertical cursor-pointer"></span>
                               		 </span>
                                    <ul class="dropdown-menu">
                                        <li><a href="#" class="btn btn-block">Edit</a></li>
                                        <li>
                                       {!! Form::open(['action' => ['CommentsController@WithIMGcommentdelete',  $comment->id ], 'method'=> 'POST'])!!}

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

	<?php } ?>
	@endforeach	

	</div>
	<div class="col-md-2"></div>
</div>
</div>

@endsection