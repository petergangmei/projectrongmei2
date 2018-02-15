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
        <a href="/myvideos" class="btn btn-default btn-block">My videos</a>

        <a href="/videos" class="btn btn-default btn-block">History</a>
        <a href="/videos" class="btn btn-default btn-block">heh</a>

        </div>
    </div>
    <div class="col-md-10">
        <div class="row">
            <!-- content -->
            <div class="content height-lg text- border-black padding-lg">
                <!-- ads  -->
            <button type="button" style="width: 120px; height: 35px; position: ;" class="floatRigth btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">Upload Video</button>
               
                <!-- ads end -->

                <br><br>

                <!-- traindig  -->
            <!-- <b style="color: white;">Trainding</b><br> -->

                <div style="min-height: 220px;  overflow-x: auto;" class="content border-black title-hot padding-lg">

                    @if (count($hotVids_) >0)
                        @foreach($hotVids_ as $hotVid)
                              <!-- <div class="" style="width: 1400px;"> -->
                                <a href="/video-id-{{ $hotVid->id }}"  class="cursor-pointer">

                                  <div class="panel panel-default padding-md" style="width: 250px; float: left; margin-right: 10px;">
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

                 <!-- Modal -->
                          <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">
                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                   {!! Form::open(['action'=>'PostsController@uploadvideo', 'method'=> 'POST', 'enctype'=>'multipart/form-data' ]) !!}
                                    <!-- new post box -->
                                    <div style="border:1px solid silver;"  class="bg-white border-black  border-radius-lg padding-md  panel-default ">    
                                        <div class="panel-heading "><b>Upload video</b>
                                            
                                            <span class="text-right">
                                             {!!  Form::select('category', ['SimplePost'=>'Simple post', 'News' => 'News', 'Other' => 'Other', 'LocalNews' => 'Local News'],  'all', ['class' => 'categorySelect float-right' ]) !!}
                                             </span> <span class="floatRigth"> <b>Category:</b></span>
                                        
                                            {!!  Form::select('audience', ['Everyone' => 'Everyone', 'Guys' => 'Guys Only', 'Ladies' => 'Ladies Only'],  'Everyone', ['class' => 'categorySelect float-right' ]) !!}  
                                            <span class="categorySelect "><b>Audience :-</b></span>

                                        </div>
                                    </div>
                                    <div class="modal-body">

                                            <div class=" videoupload">
                                            {!! Form::file('video_file',['class'=>'']) !!}
                                            {!! Form::file('video_thumb',['class'=>'']) !!}


                                            {{ Form::hidden('post_type', 'video') }}
                                                
                                            </div>
                                            <div class="form-group">
                                                {{ Form::text('video_title', '', ['class'=>'form-control', 'placeholder'=>'Title']) }}
                                                {{ Form::textarea('video_description', '', ['id'=>'article-ckeditor','style'=>'height:70px;', 'class'=>'form-control text-areaa', 'placeholder' => 'Video Description'] )}}
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

            
            <!-- traindig  -->
<!--                <b style="color: white;">Recommended</b><br>
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