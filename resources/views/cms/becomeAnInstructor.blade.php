@extends('layouts.main2')

@section('content')
<div class="clearfix"></div>


<header class="instructorheader">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 hidden-xs">
                <a class="navbar-brand logo" href="{{url('/')}}"><img src="{!! asset('sitesettings/'.$setting->site_logo) !!}" id="logo" class="img-responsive"></a>
            </div>
            <div class="col-sm-4"></div>
            <div class="col-sm-5">
                    <form method="get" action="{{ url('instructor/login') }}" autocomplete="off" class="form-inline insloginform">    
                      <div class="col-sm-12">
                          <div class="row titletext">
                              <span class="pull-left">Login</span>
                              <span class="pull-right"><a href="javascript:void(0)" data-toggle="modal" data-target="#forgotpassInstructorModal" data-dismiss="modal" style="color: #fff;">Forgot Password?</a></span>
                          </div>
                      </div>
                      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                          <input type="email" class="textbox" name="email" placeholder="Email" value="{{ old('email') }}">
                          @if ($errors->has('email'))
                          <span class="help-block">
                              <strong>{{ $errors->first('email') }}</strong>
                          </span>
                          @endif
                      </div>
                      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                          <input type="password" class="textbox" name="password" placeholder="Password">
                          @if ($errors->has('password'))
                          <span class="help-block">
                              <strong>{{ $errors->first('password') }}</strong>
                          </span>
                          @endif
                      </div>
                      <button type="submit" class="insloginbtn">Login</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="insRegisterPanel">
    <div class="container">
        <div class="col-sm-4 pull-right">
            <div class="insloginblock">
                <h2 class="inslogintitle">Register Now</h2>
                <form method="post" action="instructor/register" autocomplete="off" class="insloginformblock">
                    <div class="row">
                        {{csrf_field()}}
                        <div class="col-sm-12">
                            <div class="form-group{{ $errors->has('instructor_name') ? ' has-error' : '' }}">
                                <input type="text" class="form-control" name="instructor_name" placeholder="Name" value="{{ old('instructor_name') }}">
                                @if ($errors->has('instructor_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('instructor_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group{{ $errors->has('instructor_phone') ? ' has-error' : '' }}">
                                <input type="tel" class="form-control" name="instructor_phone" placeholder="Contact" value="{{ old('instructor_phone') }}">
                                @if ($errors->has('instructor_phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('instructor_phone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group{{ $errors->has('instructor_email') ? ' has-error' : '' }}">
                                <input type="email" class="form-control" name="instructor_email" placeholder="Email" value="{{ old('instructor_email') }}">
                                @if ($errors->has('instructor_email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('instructor_email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group{{ $errors->has('instructor_password') ? ' has-error' : '' }}">
                                <input type="password" class="form-control" name="instructor_password" placeholder="Password">
                                @if ($errors->has('instructor_password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('instructor_password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group{{ $errors->has('instructor_password_confirmation') ? ' has-error' : '' }}">
                                <input type="password" class="form-control" name="instructor_password_confirmation" placeholder="Confirm Password">
                                @if ($errors->has('instructor_password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('instructor_password_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-sm-12">
                            <button type="submit" class="loginbtn">Register Now</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<div class="slideSection">
      <div class="container">
        <div class="row">
          <div class="col-sm-2"></div>
          <div class="col-sm-8">
            <h2>doing business on Disciplemart is really easy</h2>
          </div>
          <div class="col-sm-2"></div>
        </div>
    </div>
          <div class="clearfix"></div>
          <div class="slideArea">
            <div id="seller" class="owl-carousel owl-theme">
                <div class="item">
              <div class="slideblock">
                <div class="container">
                    <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                  <h3>Step 1</h3>
                  <h2>List your courses</h2>
                  <ul>
                    <li>
                      <span class="sellicon"><img src="{!! asset('design/images/mouse.svg') !!}"></span>
                      <p>Easy to use</p>
                    </li>
                    <li>
                      <span class="sellicon"><img src="{!! asset('design/images/list.svg') !!}"></span>
                      <p>Easy listing</p>
                    </li>
                    <li>
                      <span class="sellicon"><img src="{!! asset('design/images/sell-icon.svg') !!}"></span>
                      <p>Easy Sells</p>
                    </li>
                    </ul>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
            </div>
              </div>
              <div class="item">
              <div class="slideblock">
                <div class="container">
                    <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                  <h3>Step 2</h3>
                  <h2>Sell across India</h2>
                  <ul>
                    <li>
                      <span class="sellicon"><img src="{!! asset('design/images/charts.svg') !!}"></span>
                      <p>Sales<br/>report</p>
                    </li>
                    <li>
                      <span class="sellicon"><img src="{!! asset('design/images/planning-strategy.svg') !!}"></span>
                      <p>Marketing<br/>plans</p>
                    </li>
                    <li>
                      <span class="sellicon"><img src="{!! asset('design/images/analytics.svg') !!}"></span>
                      <p>Analytical<br/>Support</p>
                    </li>
                    </ul>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
            </div>
              </div>
              <div class="item">
              <div class="slideblock">
                <div class="container">
                    <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                  <h3>Step 3</h3>
                  <h2>Get Notification of every sale</h2>
                  <ul>
                    <li>
                      <span class="sellicon"><img src="{!! asset('design/images/car-dashboard.svg') !!}"></span>
                      <p>Login to<br/>dashboard</p>
                    </li>
                    <li>
                      <span class="sellicon"><img src="{!! asset('design/images/computer.svg') !!}"></span>
                      <p>click on<br/>order</p>
                    </li>
                    <li>
                      <span class="sellicon"><img src="{!! asset('design/images/online-shop.svg') !!}"></span>
                      <p>check the<br/>order easyly</p>
                    </li>
                    </ul>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
            </div>
              </div>
              <div class="item">
              <div class="slideblock">
                <div class="container">
                    <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                  <h3>Step 4</h3>
                  <h2>Ship the order and earn money</h2>
                  <ul>
                    <li>
                      <span class="sellicon"><img src="{!! asset('design/images/wallet.svg') !!}"></span>
                      <p>Earn nice<br/>money</p>
                    </li>
                    <li>
                      <span class="sellicon"><img src="{!! asset('design/images/support.svg') !!}"></span>
                      <p>Marketing<br/>Support</p>
                    </li>
                    <li>
                      <span class="sellicon"><img src="{!! asset('design/images/delivery-truck.svg') !!}"></span>
                      <p>Ship the<br/>courses</p>
                    </li>
                    </ul>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
            </div>
              </div>
          </div>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>


    <div class="listedblock">
      <div class="container">
        <div class="row">
          <div class="col-sm-5">
            <div class="videoWrapper">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/matrWxuh7gc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-sm-7">
            <h3>To Get Listed</h3>
            <p style="color: #fff;">All You Needs</p>
            <div class="needsblock">
              <p>Have a course of your own</p>
              <span class="andsec">&</span>
              <span class="needs vertical">GST IN ID</span>
              <span class="needs vertical">PAN Card</span>
              <span class="needs">Bank Account</span>
            </div>
            <p class="registerline">Register in less than 2 minutes</p>
            <input type="button" name="" class="insRegisterbtn" value="Start Selling">
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <footer class="instructorfooter">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 footblock">
                    <h3>Contact us</h3>
                    <p>Email us : info@disciplemart.com</p>
                </div>
                <div class="col-sm-4 footblock">
                    <h3>Social</h3>
                    <ul class="socialList">
                        <li><a href="https://www.facebook.com/disciplemart/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com/disciplemart05" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://plus.google.com/u/2/104483787075633587824" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="https://www.linkedin.com/company/13454505/" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="https://www.youtube.com/channel/UCDMQf5Ma4LkrO0r4UDBL1hA/" target="_blank"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
                <div class="col-sm-4 footblock">
                    <!-- <h3>Disciplemart.com</h3> -->
                    <a class="navbar-brand logo" href="{{url('/')}}"><img src="{!! asset('sitesettings/'.$setting->site_logo) !!}" id="logo" class="img-responsive"></a>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="insbottomfooter">
            <div class="container">
                <p>© 2018 Lodha Skill Academy Pvt. Ltd, All rights reserved</p>
            </div>
        </div>
    </footer>

<!-- Modal -->
<div class="modal fade" id="forgotpassInstructorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body loginmodal">
                <div class="col-sm-12">
                    <h2>Forgot <span>Password</span></h2>
                    <form method="post" action="{{url('instructor/forgot-password')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="email" required name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                        </div>
                        <button type="submit" class="loginbtn">Submit Now</button>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<!-- <div class="courseDAreaHead cms2">
    <div class="container">
        <h3>Become an Instructor</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="container">
    <div class="row">
        <div class="instractorVideo">
            <div class="instractorVideoBox">
                <a href="#" class="introvideo"><span class="playbtn"></span></a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="col-sm-12 introArea">
                <h2>Why Online<span> Teaching?</span></h2>
                <h4>It has been considered to be extremely effective because of the following reasons:</h4>
                <ul class="whyteachingList">
                    <li><span class="whycount"><img src="{!! asset('design/images/earth-globe.svg') !!}"><span class="count">1</span></span>
                        <p>Not limited to a single location – It having no boundaries enables one to have students from across the world!</p>
                    </li>
                    <li>
                        <span class="whycount"><img src="{!! asset('design/images/wall-clock.svg') !!}"><span class="count">2</span></span>
                        <p>Highly flexible in nature – You will be at a freedom to prepare your coursework anytime, be it day or night.</p></li>
                    <li>
                        <span class="whycount"><img src="{!! asset('design/images/man.svg') !!}"><span class="count">3</span></span>
                        <p>Nice source of dignified earning – A great way to monetize your skills, while impacting lives of your students in a positive way.</p></li>
                </ul>
        </div>

    </div>
</div>

<div class="clearfix"></div>

<div class="registerInstractor">
    <div class="container">
        <h4>Start the change</h4>
        <h3>Share your knowledge and reach millions of students across the globe.</h3>
        <div class="clearfix"></div>
        <button type="submit" class="registerBtn btn-auto" onclick="window.open('http://disciplemart.com/instructor/register','_blank')">Register Now</button>
    </div>
</div>

<div class="stepArea">
    <div class="container">
        <h2 class="stepTitle">Share your knowledge in<br/>Six simple steps</h2>
        <ul class="stepList">
            <li>
                <div class="stepCount">
                    <h3>1</h3>
                    <h4>Step</h4>
                </div>
                <p>Login as a instructor</p>
            </li>
            <li>
                <div class="stepCount">
                    <h3>2</h3>
                    <h4>Step</h4>
                </div>
                <p>List your courses</p>
            </li>
            <li>
                <div class="stepCount">
                    <h3>3</h3>
                    <h4>Step</h4>
                </div>
                <p>Get a call from our side for verification</p>
            </li>
            <li>
                <div class="stepCount">
                    <h3>4</h3>
                    <h4>Step</h4>
                </div>
                <p>Set your courses live</p>
            </li>
            <li>
                <div class="stepCount">
                    <h3>5</h3>
                    <h4>Step</h4>
                </div>
                <p>Get a triggered mail whenever get a order</p>
            </li>
            <li>
                <div class="stepCount">
                    <h3>6</h3>
                    <h4>Step</h4>
                </div>
                <p>Ship it by yourself or get it shipped with our help</p>
            </li>
        </ul>
    </div>
</div>

<div class="clearfix"></div>

<div class="whobeSection">
    <div class="container">
        <div class="whobeBlock">
            <h2>Who can be an <span>Online Instructor?</span></h2>
            <ul class="whylist">
                <li>Anyone with serious passion for teaching and educating the mass</li>
                <li>Anyone having a sound knowledge base to launch a proficient online program</li>
            </ul>
        </div>
        <div class="whobeBlock2">
            <h4>Seems difficult to record <span>course by yourself?</span></h4>
            <h5>Not a problem at all! We have a professional studio setup ready with latest equipments, ideal to capture the best videos . Visit our office and we will get it recorded for you! <a href="{!! URL::to('contact-us') !!}">Contact us</a> for more details.</h5>
        </div>
    </div>
</div>

<div class="spacer50"></div>
<div class="clearfix"></div>

<div class="container teachercontact text-center">
    <h2>What are you waiting for? Register with disciplemart and take no time in offering your online course to the world! Good luck!</h2>
    <h2>In case you have any questions, feel free to email us at <span>info@disciplemart.com</span> or call @ <span>+91 9804982656.</span></h2>
</div>

<div class="clearfix"></div>
<div class="spacer20"></div>

<div style="display: none;" id="hidden-content">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                        Collapsible Group Item #1
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                        Collapsible Group Item #2
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                        Collapsible Group Item #3
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                <div class="panel-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>
            </div>
        </div>

    </div>
</div>

<div class="clearfix"></div>
<div class="spacer50"></div> -->
@endsection
