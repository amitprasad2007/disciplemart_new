@extends('layouts.main')

@section('content')

<div class="clearfix"></div>
<div class="bannerArea">
    <div id="banner" class="owl-carousel owl-theme">
        @foreach($banners as $banner)
        <div class="item">
            <img src="{!! asset('banners_image/'.$banner->image) !!}">
            <div class="caption">
                <h2><a href="{{$banner->link}}">{{$banner->title}}</a></h2>
                <p>{{$banner->description}}</p>
            </div>
        </div>
        @endforeach
    </div>
    <?php /* ?>
    <div class="bannerContentArea">
        <h2>Try <span>Online</span> Course Now!</h2>
        <h4>We pride ourselves on providing the most up-to-date content for<br/>our students to learn each course.</h4>
        <form class="searchform" role="search">
            <div class="form-group">
                <select class="form-control chosen-select" onchange="searchCourse(this.value)" data-placeholder="Search Course">
                    <option value="">Search Course</option>
                    @foreach($searchCourse as $val)
                    <option value="{{ $val->id.'/'.strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $val->title)) }}">{{$val->title}}</option>
                    @endforeach
                </select>
            </div>
            <button type="button" class="btn btn-default"><i class="fa fa-search"></i></button>
        </form>
        <script>
            function searchCourse(val) {
                if(val) {
                    window.open('{!! URL::to("course-details") !!}/'+val,'_self');
                }
            }
        </script>
        <div class="clearfix"></div>
        @if($categories)
        <?php //echo '<pre>'; print_r($categories); die; ?>
        <ul class="hintlist">       
            @foreach($categories as $category)
            @if($category->is_home == 1)
            <li>
                <a href="{{ url('courses?category='.$category->id) }}" class="hints">
                    <img src="{!! asset('design/images/intro1.svg') !!}">
                    <h4>{{ $category->name }}</h4>
                </a>
            </li>
            @endif
            @endforeach
            <!--<li>
                <div class="hints">
                    <img src="{!! asset('design/images/abacus.svg') !!}">
                    <h4>Learn From The Experts</h4>
                </div>
            </li>
            <li>
                <div class="hints">
                    <img src="{!! asset('design/images/book.svg') !!}">
                    <h4>Accredited Curriculum</h4>
                </div>
            </li>
            <li>
                <div class="hints">
                    <img src="{!! asset('design/images/videoplayer.svg') !!}">
                    <h4>Learn Anything Oline</h4>
                </div>
            </li>
            <li>
                <div class="hints">
                    <img src="{!! asset('design/images/lightbulb.svg') !!}">
                    <h4>Best Industry Leaders</h4>
                </div>
            </li>
            <li>
                <div class="hints">
                    <img src="{!! asset('design/images/briefcase.svg') !!}">
                    <h4>Book Library & Store</h4>
                </div>
            </li>-->
        </ul>
        <div class="clearfix"></div>
        @endif
        <a href="javascript:void(0)" class="downarrow"><img src="{!! asset('design/images/mouse.svg') !!}"></a>
    </div>
    <?php */ ?>
</div>

<div class="clearfix"></div>

<div class="wrapper">

    <div class="container carousel-container">
        <div id="courses" class="owl-carousel owl-theme">
            @if(count($courses))
                @foreach($courses as $course)
                <?php $key = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $course->title)); ?>
                <div class="item">
                    <div class="packageBox">
                        <div class="imageBox">
                            <img style="height: 142px; width: 480px;" src="{!! asset('courses_image/'.$course->image) !!}" class="img-responsive">
                        </div>
                        <h3 class="packageTitle"><a href="{!! URL::to('course-details/'.$course->id.'/'.$key) !!}">{{substr($course->title,0,20)}}</a></h3>
                        <div class="clearfix"></div>
                        <p>{{$course->author_name}} / {{$course->author_subject}} Author</p>
                        <div class="packageDetails">
                            <ul>
                                <li><i class="fa fa-clock-o" aria-hidden="true"></i> {{$course->duration}}</li>
                                <li><i class="fa fa-book" aria-hidden="true"></i> {{$course->modules}}</li>
                            </ul>
                            @if($course->price != $course->offered_price)
                                <h3 class="packagePrice offered_price"><span><i class="fa fa-inr" aria-hidden="true"></i><strike>{{number_format($course->price,2)}}/</strike></span><i class="fa fa-inr" aria-hidden="true"></i>{{number_format($course->offered_price,2)}}/-</h3>
                            @else
                                <h3 class="packagePrice"><i class="fa fa-inr" aria-hidden="true"></i>{{number_format($course->offered_price,2)}}/-</h3>
                            @endif
                            <?php /*
                            @if(Auth::check())
                            <a href="{!! URL::to('enrollment/'.$course->id.'/'.$key) !!}" class="packagebtn" >Book Now</a>
                            @else
                            <a title="Book Now" href="#" data-toggle="modal" data-target="#myModal" class="packagebtn">Book Now</a>
                            @endif
                             */ ?>
                            <!-- <a href="{!! URL::to('add-to-cart/'.$course->id.'/'.$key) !!}" title="Add to Cart" class="packagebtn">Add to Cart</a> -->
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div>No course found!</div>
            @endif
        </div>
    </div>


<?php /* ?>

<div class="courseCat">
    <div class="container">
        <h2>We have the largest collection of courses</h2>
        <div id="coursescat" class="owl-carousel owl-theme">
            @foreach($categories as $k=>$category)
            <div class="item">
                <a href="{{ url('courses?category='.$category->id) }}" class="course{{$k+1}}"><span>{{ $category->name }}</span></a>
            </div>
            @endforeach
            <!--<div class="item">
                <a href="">Programming Languages</a>
            </div>
            <div class="item">
                <a href="" class="course2">Mobile Application</a>
            </div>
            <div class="item">
                <a href="" class="course3">Web Developement</a>
            </div>
            <div class="item">
                <a href="" class="course4">CRM Menagement</a>
            </div>
            <div class="item">
                <a href="" class="course5">Economy Course</a>
            </div>-->
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="courseArea">
    <div class="container carousel-container">
        <h2>Discover Our <span>Featured Courses</span></h2>
        <div id="courses" class="owl-carousel owl-theme">
            @if(count($courses))
                @foreach($courses as $course)
                <?php $key = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $course->title)); ?>
                <div class="item">
                    <div class="packageBox">
                        <div class="imageBox">
                            <img style="height: 200px; width: 480px;" src="{!! asset('courses_image/'.$course->image) !!}" class="img-responsive">
                        </div>
                        <h3 class="packageTitle"><a href="{!! URL::to('course-details/'.$course->id.'/'.$key) !!}">{{substr($course->title,0,20)}}</a></h3>
                        <div class="clearfix"></div>
                        <p>{{$course->author_name}} / {{$course->author_subject}} Author</p>
                        <div class="packageDetails">
                            <ul>
                                <li><i class="fa fa-clock-o" aria-hidden="true"></i> {{$course->duration}}</li>
                                <li><i class="fa fa-book" aria-hidden="true"></i> {{$course->modules}}</li>
                            </ul>
                            @if($course->price != $course->offered_price)
                                <h3 class="packagePrice offered_price"><span><i class="fa fa-inr" aria-hidden="true"></i><strike>{{number_format($course->price,2)}}/</strike></span><i class="fa fa-inr" aria-hidden="true"></i>{{number_format($course->offered_price,2)}}/-</h3>
                            @else
                                <h3 class="packagePrice"><i class="fa fa-inr" aria-hidden="true"></i>{{number_format($course->offered_price,2)}}/-</h3>
                            @endif
                            @if(Auth::check())
                            <a href="{!! URL::to('enrollment/'.$course->id.'/'.$key) !!}" class="packagebtn" >Book Now</a>
                            @else
                            <a title="Book Now" href="#" data-toggle="modal" data-target="#myModal" class="packagebtn">Book Now</a>
                            @endif
                            <!-- <a href="{!! URL::to('add-to-cart/'.$course->id.'/'.$key) !!}" title="Add to Cart" class="packagebtn">Add to Cart</a> -->
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div>No course found!</div>
            @endif
        </div>
    </div>
    <a class="coursebtn" href="{!! URL::to('courses') !!}">View All Courses</a>
</div>

<div class="clearfix"></div>

<?php */ ?>


<!-- <div class="whymart">
    <div class="whyLeftmart">
        <a data-fancybox href="https://www.youtube.com/watch?v=matrWxuh7gc&feature=youtu.be" class="videoArea">
            <span class="playbtn"></span>
        </a>
    </div>
    <div class="whyRightmart">
        <div class="contentArea">
            <h2>Why Disciple <span>Mart</span></h2>
            <ul class="whylist">
                <li>Learn anytime, anywhere at your own pace</li>
                <li>Get trained by top notch instructors</li>
                <li>Choose from our extensive collection of courses</li>
                <li>Earn a certificate at the end of course to make your training count</li>
            </ul>
        </div>
    </div>
</div>

<div class="clearfix"></div> -->

<!-- <div class="appSection">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h4>Learn on the go</h4>
                <h3>Access your courses anywhere, anytime & prepare with practice tests</h3>
                <a href="#"><img src="{!! asset('design/images/playbtn.png') !!}"></a>
                <a href="#"><img src="{!! asset('design/images/appbtn.png') !!}"></a>
            </div>
            <div class="col-sm-6 text-center">
                <img src="{!! asset('design/images/smartphone.png') !!}" class="appspic">
            </div>
        </div>
    </div>
</div> -->

<div class="clearfix"></div>

<div class="testomonialArea">
    <div class="container">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="row">
                <h2 class="sectionTitle text-center">Disciplemart <span>Stories</span></h2>
                <div class="clearfix"></div>
                

                <div id="testimonial" class="owl-carousel">
                    <div class="testimonial">
                        <p class="description">
                            Disciple Mart has aided me in discovering a wide array of educational opportunities. The community at Disciple Bay has been a pleasure to work with. Not only did they leave any stone unturned for my professional excellence, but also their infinite coverage of topics and intelligent inter activity continues to make them an integral part of my day to day activities.
                        </p>
                        <div class="testimonial-content">
                            <div class="pic">
                                <img src="{!! asset('design/images/test1.png') !!}">
                            </div>
                            <h3 class="testimonial-title">Shreya Banerjee
                                <small>Marketing Manager</small>
                            </h3>
                        </div>
                    </div>
 
                    <div class="testimonial">
                        <p class="description">
                            Their customer support is great, the responses are quick and the industry personalities went out of their way to ensure I got my answers. Overall, it was a brilliant and a very helpful experience!
                        </p>
                        <div class="testimonial-content">
                            <div class="pic">
                                <img src="{!! asset('design/images/test2.jpg') !!}">
                            </div>
                            <h3 class="testimonial-title">Svetlana Chatterjee
                                <small>Marketing Executive</small>
                            </h3>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

</div>

<div class="clearfix"></div>

@endsection