@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-1 border-black"></div>
        <div class="col-md-8 border-black ">

            <!-- background image  -->

                <div style="height: 0px;   overflow: hidden;" class="border-black ">
           				 <!-- profile pic  -->

              <!--     <div style="color:white; font-size: 23px; border-radius: 5%; height: 140px; width: 400px; margin: 90px 10px; position: absolute;" class="border-black ">
                        <img style="height: 140px; width: 140px;" class="thumbnail" src="/storage/default-images/p1.jpg">
                        <b>Peter Gangmei</b>
                  </div> -->
            		<!-- profiel pic end -->

                    <!-- <img style="width: 100%; position: static;"  src="/storage/default-images/bg1.jpg"> -->

                </div>
            <!-- background image end -->
            <br>
            <!-- main side positioning -->
            <div class="row">
                <div  class="col-md-4 border-radius-lg  border-black">
                    <div class="border-radius-md padding-lg bg-white">
                        <h3> {{  auth()->user()->name }}</h3>
                        <b>Nummber of videos: </b>{{ count($posts) }}<br>
                        <b>Gender</b> Male <br>
                        <b>Live in</b> New Delhi <br>
                        <b>From</b> Namdailong <br>
                      <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Upload Audio</button>

                    </div>  
                    <br>
                    <div class="border-radius-md padding-lg bg-white">
                        Photos
                       
                         @if(count($user_photos)> 0 )

                            <hr>
                            <a href="" class="btn btn-block">See All</a>
                        @else
                            <div class="text-center padding-lg">
                            <p>You haven't posted anything yet.</p>
                            </div>
                        @endif

                    </div>  

                </div>
                

                <div class="col-md-8 border-black">


                                                                      <!-- Modal -->
                          <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                   {!! Form::open(['action'=>'PostsController@uploadaudio', 'method'=> 'POST', 'enctype'=>'multipart/form-data' ]) !!}
                                    <!-- new post box -->
                                    <div style="border:1px solid silver;"  class="bg-white border-black  border-radius-lg padding-md  panel-default ">    
                                        <div class="panel-heading "><b>Upload Audio</b>
                                            
                                            <span class="text-right">
                                             {!!  Form::select('category', ['SimplePost'=>'Simple post', 'News' => 'News', 'Other' => 'Other', 'LocalNews' => 'Local News'],  'all', ['class' => 'categorySelect float-right' ]) !!}
                                             </span> <span class="floatRigth"> <b>Category:</b></span>
                                        
                                            {!!  Form::select('audience', ['Everyone' => 'Everyone', 'Guys' => 'Guys Only', 'Ladies' => 'Ladies Only'],  'Everyone', ['class' => 'categorySelect float-right' ]) !!}  
                                            <span class="categorySelect "><b>Audience :-</b></span>

                                        </div>
                                    </div>
                                    <div class="modal-body">

                                            <div class=" videoupload">
                                            {!! Form::file('audio_file',['class'=>'']) !!}

                                            {{ Form::hidden('post_type', 'audio') }}
                                                
                                            </div>
                                            <div class="form-group">
                                                {{ Form::text('audio_title', '', ['class'=>'form-control', 'placeholder'=>'Title']) }}
                                                {{ Form::textarea('audio_description', '', ['id'=>'article-ckeditor','style'=>'height:70px;', 'class'=>'form-control text-areaa', 'placeholder' => 'Audio Description'] )}}
                                            </div>
                                            <div class="form-group">
                                            </div>
                                            <dvi class="hidden-xs">
                                            </dvi>

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



                    <!-- new post box end -->
                <br>
                <!-- Post history -->
                <div class="border-black border-radius-lg bg-white padding-md">
                        <div class="btn-group " >
                            <a href="/dashboard"  class="btn csBtn btn-default"><span class="hidden-xs">My</span> Posts</a>
                            <a href="/myvideos" class="btn csBtn btn-default"><span class="hidden-xs">My</span> Videos </a>
                            <a href="/myaudios" class="btn csBtn btn-default active"><span class="hidden-xs">My</span> Audios </a>
                        </div>
                    
                    <br><br>
                    
                    <div class="">
                       
                        @if(count($posts)> 0 )

                            @foreach($posts as $post)

                                <div class="col-md-11 col-xs-8">

                                    <b>{{ $post->post_title }}</b> 
                                    <div class="floatRigth-sm">
                            			<span class="glyphicon glyphicon-globe"></span> <i> <u><small>{{ $post->audience }}</small></u> </i>  <span class="colorWhite">_</span>  <b><small> <span class="glyphicon glyphicon-list"></span> {{ $post->category }}</small> </b><i>(category)</i>
                                	</div>
                                </div>

                                    <div class="col-md-1 col-xs-4">
                                        <span class="dropdown ">
                                          <span class="floatRigth-sm"  data-toggle="dropdown">
                                              <span class="glyphicon glyphicon-cog cursor-pointer"></span>
                                            </span>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#" class="btn btn-block">Edit</a></li>
                                                    <li>
                                                   {!! Form::open(['action' => ['PostsController@deleteaudio', $post->id], 'method'=> 'POST'])!!}
                                                      {{ Form::hidden('_method','DELETE') }}
                                                      {{ Form::hidden('user_id', $post->user_id) }}
                                                      {{ Form::submit('Delete Post', ['class' => 'btn btn-block', 'style' => 'float:']) }}
                                                    {!! Form::close() !!}
                                                    </li>
                                                </ul>
                                        </span>
                                    </div>

                                <div style="border:1px solid silver; " class="border-black border-radius-lg padding-md">
                                    
                                    <br>
                                        <audio style="width: 100%;" preload="none" controls>
                                          <source src="horse.ogg" type="audio/ogg">
                                          <source src="/storage/audio_posted/<?php echo auth()->user()->id; ?>/{{ $post->post_audio }}" type="audio/mpeg">
                                        </audio>

                                    <p><u><small><b>Uploaded on</b> {{ $post->created_at }}</small></u> :- {{ str_limit($post->post,'140') }}</p>
                                    
                                </div><br>
                            @endforeach
                        @else
                            <div class="text-center padding-lg">
                            <p>You haven't uploaded any video yet.</p>
                            </div>
                        @endif

                    </div>



                </div>
                <!-- Post history end -->

                </div>
           
            </div>
            <!-- main side positioning end -->




        </div>
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
