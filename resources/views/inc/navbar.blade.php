

<nav class=" navbar navbar-default navbar-fixed-top" role="navigation ">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      &nbsp;

      <div class="btn-group">

        <a href="#" class="btn btn-default navbar-btn dropdown-toggle" data-toggle="dropdown"> <span class="caret"></span>  <span class="hidden-xs">Discover</span> <a href="/" class="hidden-lg hidden-md hidden-sm navbar-brand">Rongmei</a></a>
        <ul class="dropdown-menu">
          <li><a href="/posts">News</a></li>
          <li><a href="/videos">Videos </a></li>
          <li><a href="/audios">Audios </a></li>
          <li class="divider"></li>
          <li><a href="#">Separated</a></li>
          <li class="divider"></li>
          <li><a href="#">One more </a></li>
        </ul>
      </div>

    </div>


    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbar-collapse-1">

<!--       <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
      </form> -->


      <a href="/" class="hidden-xs navbar-brand">Rongmei</a></a>
      <ul class="nav navbar-nav navbar-right">
       <!--  <li><a href="#">Link</a></li>
        <li><a href="#">Link</a></li>
        <li><a href="#">Link</a></li> -->
<!--         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li> -->
      </ul>


                <div class="collapse navbar-collapse" id="app-navbar-collapse">

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right" style="padding-right:20px;">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                        <li style="margin: 0px 0px;" class="">
                               <a href="/dashboard"> <span class="glyphicon glyphicon-user"></span> Profile </a>
                        </li>

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                     <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">

                                    <li>
                                        <a href="/dashboard">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>

                        @endguest
                    </ul>
                </div>

    </div><!-- /.navbar-collapse -->
</nav>
