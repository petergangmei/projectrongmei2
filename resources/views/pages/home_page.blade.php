@extends('layouts.app')
@section('content')
<title>Ruangmei Naga</title>
    <div class="container-fluid ">
        <div class="row">
        	<div class="col-md-2 border-black">
        		<b>Nav</b>
        	</div>
        	<div class="col-md-8  bg-img">
                <!-- carousel starts here -->
            		<div class="row">
                          <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                              <li data-target="#myCarousel" data-slide-to="1"></li>
                              <li data-target="#myCarousel" data-slide-to="2"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                              <div class="item active">
                                <img src="/storage/default-images/cus1.jpg" alt="Los Angeles" style="width:100%;">
                              </div>

                              <div class="item">
                                <img src="/storage/default-images/cus2.jpg" alt="Chicago" style="width:100%;">
                              </div>
                            
                              <div class="item">
                                <img src="/storage/default-images/cus3.jpg" alt="New york" style="width:100%;">
                              </div>
                            </div>

                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                              <span class="glyphicon glyphicon-chevron-left"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                              <span class="glyphicon glyphicon-chevron-right"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>
                        </div>
                    <!-- carousel ends here -->

                    <hr>
                      <div class="about-rongmei">
                        <div class="padding-md">
                          <p>The Rongmei are a major Naga tribe indigenous to Assam, Manipur and Nagaland in North-East India. The Rongmei Naga are a scheduled tribe under the Constitution of India.[1] Like any other Naga tribe, the Rongmei have their own rich culture, customs, and traditions. The Gaan-Ngai festival (post-harvest festival) is celebrated annually between December and January. Among Naga tribes, they are known for their colorful dances and exquisite traditional attire.</p>
                        </div>
                      </div>

                      <div class="overview-dev">
                      <h3>Overview</h3>

                        <div class="padding-md">
                          <p>The ancestral home of the Rongmei Naga is in the mountain ranges of Tamenglong, and the adjacent mountainous areas of Peren and Haflong. The term Rongmei -- etymologically -- means "the southerners" and refers to the location of traditional Rongmei settlement to the south of the vast Zeliangrong[2] Naga. Those settling in the southern part of Manipur call themselves Rongmei</p>
                        </div>
                      </div>

                 <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>

        <div class="col-md-2 border-black">
        		sidebox

        </div>

    </div>
 </div>

@endsection

