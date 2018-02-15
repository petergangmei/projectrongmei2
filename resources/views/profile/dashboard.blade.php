@extends('layouts.app')
@section('content')
<title>{{ auth()->user()->name }} . Profile</title>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-1 border-black"></div>
        <!-- middle row -->
        <div class="col-md-8 border-black ">
            <!-- background image  -->
                <div style="height: 300px;   overflow: hidden;" class="border-black ">
            <!-- profile pic  -->
                  <div style="color:white; font-size: 23px; border-radius: 5%; height: 140px; width: 400px; margin: 90px 10px; position: absolute;" class="border-black ">
                        <div style="position: ; height: ;" class="border-black">
                          <button class="btn btn-default btn-sm" style="opacity: 0.6; background-color: black; color: white; position: absolute; margin: 110px 0px;" data-toggle="modal" data-target="#myModal">change</button>
                          <img style="height: 140px; width: 140px;" alt="Profile picture" class="thumbnail" src="/storage/profile_image/{{ auth()->user()->id }}/{{ auth()->user()->profile_image }}" >
                        </div>
                        <div>
                        <b >{{ auth()->user()->name }} {{auth()->user()->sname}}</b>
                        </div>
                  </div>
            <!-- profiel pic end -->
                    <!-- background image area | -->
                    <img style="width: 100%; position: static;"  src="/storage/default-images/bg1.jpg">
                </div>
            <!-- background image end -->
            <br>

            <!-- Middle row -->
            <div class="row">
                <div  class="col-md-4 border-radius-lg  border-black">
                  <!-- check account type here -->
                  <?php if( 'individual' == auth()->user()->account_type ) { ?>
                    <!-- Indiviual account | about section -->
                    <div class="border-radius-md padding-lg bg-white">
                        <h3>Bio</h3>
                        <b>Gender</b> {{auth()->user()->gender}} <br>
                        <b>Live</b> <?php if(auth()->user()->address_one == ''){echo "not set";}else{ echo 'auth()->user()->address_one'; } ?> <br>
                        <b>From</b> <?php if(auth()->user()->address_two == ''){echo "not set";}else{ echo 'auth()->user()->address_two'; } ?> <br>
                    </div>
                    <!-- Indiviual account ends| about section -->
                  <?php } else { ?>
                    <!-- Community account | about section -->
                    <div class="border-radius-md padding-lg bg-white">
                        <b>About</b><br>
                        <b>Address</b> <?php if(auth()->user()->address_one == ''){echo "not set";}else{ echo 'auth()->user()->address_one'; } ?> <br>
                    </div>
                    <!-- Community account ends | about section -->
                  <?php }?>
                    <br>
                    <!-- print profile image history  -->
                    <div class="border-radius-md padding-lg bg-white">
                        Photos
                         @if(count($profile_img_his)> 0 )
                                <div class="row">
                                    <div class="col-md-12">
                                      @foreach($profile_img_his as $user_photo)

                                        <div style="border:1px solid silver; width: 120px; float:left; margin:2px 2px; " class="border-black border-radius-md padding-md">
                                            <img style="width: 100%; height: 100%;" src='/storage/profile_image/<?php echo auth()->user()->id; ?>/{{ $user_photo->profile_image }}'>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            <hr>
                            <a href="" class="btn btn-block">See All</a>
                        @else
                            <div class="text-center padding-lg">
                            <p>You haven't uploaded anything profile picture yet.</p>
                            </div>
                        @endif
                    </div>
                    <!-- print profile image history end -->
                </div>
                <!-- main side positioning -->
                <div class="col-md-8 border-black">
                  {!! Form::open(['action'=>'PostsController@store', 'method'=> 'POST', 'enctype'=>'multipart/form-data' ]) !!}
                    <!-- new post box -->
                    <div style="border:1px solid silver;"  class="bg-white border-black  border-radius-lg padding-md  panel-default ">
                        <div class="panel-heading "><b>Share Post</b>
                            <span class="text-right">
                             {!!  Form::select('category', ['SimplePost'=>'Simple post', 'News' => 'News', 'Other' => 'Other', 'LocalNews' => 'Local News'],  'all', ['class' => 'categorySelect float-right' ]) !!}
                             </span> <span class="floatRigth"> <b>Category:</b></span>
                        </div>
                            {{ Form::hidden('post_type', 'image') }}
                            <div class="form-group">
                                {{ Form::textarea('post', '', ['id'=>'article-ckeditor','style'=>'height:70px;', 'class'=>'form-control text-areaa', 'placeholder' => 'Text area'] )}}
                            </div>
                            <dvi class="hidden-xs">
                            {!! Form::file('post_image',['class'=>'custom_file']) !!}
                            </dvi>
                            {{ Form::submit(' Share Post ', ['class'=>'btn btn-info']) }}
                             with
                            {!!  Form::select('audience', ['Everyone' => 'Everyone', 'Guys' => 'Guys Only', 'Ladies' => 'Ladies Only'],  'Everyone', ['class' => 'select1' ]) !!}
                        {!! Form::close() !!}
                    </div>
                    <!-- new post box end -->

                    <!-- Updade profile image model starts here -->
                    <!-- Modal -->
                          <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                   {!! Form::open(['action'=>'UserdetailsController@uploadprofile_img', 'method'=> 'POST', 'enctype'=>'multipart/form-data' ]) !!}
                                    <!-- new post box -->
                                    <div style="border:1px solid silver;"  class="bg-white border-black  border-radius-lg padding-md  panel-default ">
                                        <div class="panel-heading "><b>Upload Profile picture</b>
                                        </div>
                                    </div>
                                    <div class="modal-body">
                                        <div class=" videoupload">
                                            {!! Form::file('profile_pic',['class'=>'']) !!}
                                            {{ Form::hidden('post_type', 'profile_image') }}
                                        </div>
                                        <div class="row">
                                            <div class="col-md-10 text-left">
                                                {{ Form::submit('Upload ', ['class'=>'csBtn2 btn btn-info']) }}
                                                {!! Form::close() !!}
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </div>
                            </div>
                          </div>
                   <!-- profile pic update model end -->
                  <br>
                  <!-- Post history -->
                  <div class="border-black border-radius-lg bg-white padding-md">
                          @if(count($posts)> 0 )
                              @foreach($posts as $post)
                                  <div class="col-md-11 col-xs-8">
                                      <b>Post shared</b> with <i> <u><small>{{ $post->audience }}</small></u> </i>  <span class="colorWhite">___</span>  <b><small>{{ $post->category }}</small> </b><i>(category)</i> @if($post->post_img == 'nofile') <u><small> {{ $post->created_at }}</small></u> @endif
                                  </div>
                                  <!-- history post header section -->
                                  <div class="col-md-1 col-xs-4">
                                      <span class="dropdown ">
                                        <span class="floatRigth-sm"  data-toggle="dropdown">
                                            <span class="threeDots"></span>
                                        </span>
                                          <ul class="dropdown-menu">
                                              <li><a href="#" class="btn btn-block">Edit</a></li>
                                              <li>
                                             {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method'=> 'POST'])!!}
                                                {{ Form::hidden('_method','DELETE') }}
                                                {{ Form::hidden('user_id', $post->user_id) }}
                                                {{ Form::submit('Delete Post', ['class' => 'btn btn-block', 'style' => 'float:']) }}
                                              {!! Form::close() !!}
                                              </li>
                                          </ul>
                                      </span>
                                  </div>
                                  <!-- history post header section ends -->

                                  <!-- history post body  section -->
                                  <div style="border:1px solid silver; " class="border-black border-radius-lg padding-md">
                                      <br>
                                      <!-- if  post img is not empty| print the image file  -->
                                      @if($post->post_img !== 'nofile')
                                        <img style="width: 100%; height: 100%;" src='/storage/images_posted/<?php echo auth()->user()->id; ?>/{{ $post->post_img }}'>
                                      @endif
                                      <!-- else if post img has no file | do not print image file-->
                                      @if($post->post_img == 'nofile')
                                      <div class="padding-lg">
                                        <p>{{ str_limit($post->post,'140') }}</p>
                                        </div>
                                      @else
                                        <p><u><small><b>Posted at</b> {{ $post->created_at }}</small></u> :- <br>{{ str_limit($post->post,'140') }}</p>
                                      @endif
                                  </div>
                                  <!-- history post body section end -->
                                  <br>
                              @endforeach
                          @else
                              <div class="text-center padding-lg">
                              <p>You haven't posted anything yet.</p>
                              </div>
                          @endif
                  </div>
                  <!-- Post history end -->
                </div>
              <!-- main side positioning end -->
            </div>
          <!-- middle row ends -->
        </div>
        <!-- middle row end -->
        <div class="col-md-3 border-black">
            <br><br><br>
            @if(count($errors)>0)
                @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
                @endforeach
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
             @endif

             @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
             @endif

            <br><br><br><br><br><br>
            <br><br><br><br><br><br>
            <br><br><br><br><br><br>
            <br><br><br><br><br><br>

        </div>

    </div>
</div>
@endsection
