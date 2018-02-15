@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row rbg">
        <div class="" >
            <div class="col-md-8"></div>
            <div class="panel-body col-md-4 border-black " style="background-color: #F0F3F4; opacity: 0.9;">
                    <h2><b>Create a new account</b></h2>
                    <p>It's free and always will be.</p>
                    <!-- Radio button -->
                    <div class="col-md-3 col-xs-3 border-black"><b>Account </b></div>
                    <div class="col-md-4 col-xs-4 border-black">
                    <input type="radio" name="account_type" id="individual" value="individual" checked> Individual
                    </div>
                    <div class="col-md-4 col-xs-4 border-black">
                    <input type="radio" name="account_type" id="community" value="community"> Coummunity
                    </div>
                    <br>
                    <br>
              <!-- individual_rcontent starts here -->
              <div class="individual_rcontent" >
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <!-- user name -->
                    <input type="hidden" name="account_type" value="individual">

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <div class="col-md-6 border-black">
                            <input id="name" type="text" placeholder="Fist name" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                       <div class="hidden-md hidden-sm hidden-lg"><br></div>
                        <div class="col-md-6 border-black">
                            <input id="sname" type="text" placeholder="Surname" class="form-control" name="sname" value="{{ old('sname') }}" required >
                        </div>
                    </div>
                    <!-- email field -->
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <input id="email" type="email" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <!-- password -->
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <input id="password" placeholder="Password" type="password" class="form-control" name="password" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <!-- confirm password -->
                    <div class="form-group">
                      <div class="col-md-12 border-black">
                          <input id="password-confirm" placeholder="Confirm-password" type="password" class="form-control" name="password_confirmation" required>
                      </div>
                    </div>

                    <!-- birthday -->
                    <div class="form-group border-black text-left">
                        <div class="col-md-2 col-xs-2 text-right  border-black">
                        <select style="width: 100px; " name="d_date"  title="Date" class="form-control">
                                <option value="1" selected="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                        </select>
                        </div>
                        <div class="col-md-2 col-xs-2 border-black text-left">
                        <select style="width: 100px; " name="d_month"  title="Month" class="form-control">
                                <option value="January" selected="Jan">Jan</option>
                                <option value="February">Feb</option>
                                <option value="March">Mar</option>
                                <option value="April">Apr</option>
                                <option value="May">May</option>
                                <option value="June">Jun</option>
                                <option value="July">Jul</option>
                                <option value="August">Aug</option>
                                <option value="September">Sep</option>
                                <option value="October">Oct</option>
                                <option value="November">Nov</option>
                                <option value="December">Dec</option>
                        </select>
                        </div>
                        <div class="col-md-2 col-xs-2 border-black" >
                        <select style="width: 100px; " name="d_year" id="year" title="Year" class="form-control">
                                <option value="2000" selected="2000">2000</option>
                                <option value="2000">2000</option>
                                <option value="2000">2000</option>
                            </select>
                        </div>
                        <div class="col-md-2"></div>
                        <!-- Radio button -->
                  <div class="hidden-xs">

                  </div>
                  <br><br><br>

                    <div class="col-md-3 col-xs-3 border-black">
                    <input type="radio" name="gender" value="Female" checked> Female
                    </div>
                    <div class="col-md-3 col-xs-3 border-black">
                    <input type="radio" name="gender" value="Male"> Male
                    </div>
                    </div>
                    <p><small style="font-size: 10px;">By clicking Create an account, you agree to our Terms and confirm that you have read our Data Policy, including our Cookie Use Policy. </small></p>
                    <!-- submit button -->
                    <div class="form-group">
                        <div class="col-md-4">
                            <button type="submit" style="width: 200px;" class="btn btn-primary">
                                Create an account
                            </button>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </form>
              </div>
              <!-- individual_rcontent ends here -->

              <!-- community_rcontent starts here -->
              <div class="community_rcontent" style="display:none;">
                <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                    {{ csrf_field() }}
                    <!-- user name -->
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                      <input type="hidden" name="account_type" value="community">
                      <input type="hidden" name="sname" value="">
                      <input type="hidden" name="gender" value="">


                        <div class="col-md-12 border-black">
                            <input id="name" type="text" placeholder="Coummunity Name" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                    </div>
                    <!-- email field -->
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <input id="email" type="email" placeholder="Email" class="form-control" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <!-- password -->
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="col-md-12">
                            <input id="password" placeholder="Password" type="password" class="form-control" name="password" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <!-- confirm password -->
                    <div class="form-group">
                      <div class="col-md-12 border-black">
                          <input id="password-confirm" placeholder="Confirm-password" type="password" class="form-control" name="password_confirmation" required>
                      </div>
                    </div>

                    <!-- birthday -->
                    <div class="form-group border-black ">
                      <div class="col-md-2"><b>ESTD</b></div>
                      <br><br>
                        <div class="col-md-2 col-xs-2 text-right  border-black">
                        <select style="width: 100px; " name="d_date" id="day" title="Date" class="form-control">
                                <option value="1" selected="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                        </select>
                        </div>
                        <div class="col-md-2 col-xs-2 border-black text-left">
                          <select style="width: 100px; " name="d_month"  title="Month" class="form-control">
                                  <option value="January" selected="Jan">Jan</option>
                                  <option value="February">Feb</option>
                                  <option value="March">Mar</option>
                                  <option value="April">Apr</option>
                                  <option value="May">May</option>
                                  <option value="June">Jun</option>
                                  <option value="July">Jul</option>
                                  <option value="August">Aug</option>
                                  <option value="September">Sep</option>
                                  <option value="October">Oct</option>
                                  <option value="November">Nov</option>
                                  <option value="December">Dec</option>
                          </select>
                        </div>
                        <div class="col-md-2 col-xs-2 border-black" >
                        <input type="number" name="d_year" value="" placeholder="2000" style="width:100px;" class="form-control">
                        </div>
                        <div class="col-md-2"></div>
                        <!-- Radio button -->
                  <br><br>

                    </div>
                    <p><small style="font-size: 10px;">By clicking Create an account, you agree to our Terms and confirm that you have read our Data Policy, including our Cookie Use Policy. </small></p>
                    <!-- submit button -->
                    <div class="form-group">
                        <div class="col-md-4">
                            <button type="submit" style="width: 200px;" class="btn btn-primary">
                                Create an account
                            </button>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </form>
              </div>
              <!-- community_rcontent ends here -->


            </div>
        </div>
    </div>
</div>
@endsection
