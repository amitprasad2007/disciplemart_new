@extends('layouts.main')

@section('content')

<style type="text/css">
/* Rating Star Widgets Style */
.rating-stars ul {
  list-style-type:none;
  padding:0;
  
  -moz-user-select:none;
  -webkit-user-select:none;
}
.rating-stars ul > li.star {
  display:inline-block;
  
}

/* Idle State of the stars */
.rating-stars ul > li.star > i.fa {
  font-size:2.5em; /* Change the size of the stars */
  color:#ccc; /* Color on idle state */
}

/* Hover state of the stars */
.rating-stars ul > li.star.hover > i.fa {
  color:#FFCC36;
}

/* Selected state of the stars */
.rating-stars ul > li.star.selected > i.fa {
  color:#FF912C;
}
</style>
<div class="clearfix"></div>

<div class="courseDAreaHead">
    <div class="container">
        <h3>{{$course->title}}</h3>
    </div>
</div>

<div class="clearfix"></div>

<div class="coursepageArea">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="courseExcerpt">
                    <img src="{!! asset('courses_image/'.$course->image) !!}" class="img-responsive">
                    <div class="clearfix"></div>
                    <h2>COURSE FEATURES</h2>
                    <ul class="courseprice">
                        <li>
                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                            <span>Duration</span>
                            <span class="time">{{$course->duration}}</span>
                        </li>
                        <li>
                            <i class="fa fa-leanpub" aria-hidden="true"></i>
                            <span>Modules</span>
                            <span class="time">{{$course->modules}}</span>
                        </li>
                        <li>
                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                            <span>Medium</span>
                            <span class="time">
                                @if($course->delivery_medium == 1)
                                Pen Drive
                                @elseif($course->delivery_medium == 2)
                                Online
                                @endif
                            </span>
                        </li>
                        <li>
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>Level</span>
                            <span class="time">
                                @if($course->level == 1)
                                Beginner
                                @elseif($course->level == 2)
                                Intermediate
                                @elseif($course->level == 3)
                                Expert
                                @endif
                            </span>
                        </li>
                        <li>
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <span>Validity</span>
                            <span class="time">{{$course->validity}}</span>
                        </li>
                    </ul>
                    @if($course->is_purchased != 1)
                        @if($course->price != $course->offered_price)
                            <h3>Course Price : 
                                <span>Rs.<strike>{{number_format($course->price,2)}}/-</strike>{{number_format($course->offered_price,2)}}/-</span>
                            </h3>
                        @else
                            <h3>Course Price : 
                                <span>Rs.{{number_format($course->offered_price,2)}}/-</span>
                            </h3>
                        @endif
                    @endif
                    
                        <?php $key = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $course->title)); ?>
                        <button onclick="window.open('{!! URL::to('add-to-cart/'.$course->id.'/'.$key) !!}','_self')" type="button" class="loginbtn">Add to Cart</button>
                        <button onclick="window.open('{!! URL::to('add-to-wishlist/'.$course->id) !!}','_self')" type="button" class="loginbtn" style="margin-top:10px;">Add to Wishlist</button>
                    @if(!$course->is_stock)
                        <p style="color:#ff0000">This course is currently out of stock</p>
                    @endif
                    
                    <?php /*
                    @if(Auth::check())
                        @if($course->is_purchased != 1)
                            <button onclick="window.open('{!! URL::to('enrollment/'.$course->id.'/'.$key) !!}','_self')" type="button" class="loginbtn">ENROLL THIS COURSE</button>
                        @endif
                    @else
                    <button href="#" data-toggle="modal" data-target="#myModal" class="loginbtn">ENROLL THIS COURSE</button>
                    @endif
                     */ ?>
                </div>
                <div class="courseExcerpt author">
                    @if($course->author_image)
                    <img class="img-responsive" src="{!! asset('users_images/'.$course->author_image) !!}">
                    @else
                    <img class="img-responsive" src="{!! asset('users_image/no-user-image.gif') !!}">
                    @endif
                    <div class="clearfix"></div>
                    <h4>{{$course->author_name}}</h4>
                    <h5>{{$course->author_subject}}</h5>
                    <!-- <span class="starreview">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                    </span>
                    <ul class="courseprice">
                        <li>
                            <i class="fa fa-clock-o" aria-hidden="true"></i>
                            <span>Starts</span>
                        </li>
                    </ul> -->
                    <p>{{$course->about_author}}</p>
                </div>
            </div>
            <div class="col-sm-8 coursrbody">
                <!-- <h2 class="courseHeading">{{$course->title}}</h2> -->
                <?php 
                    function getYouTubeIdFromURL($url) {
                        
                        $url_string = parse_url($url, PHP_URL_QUERY);
                        parse_str($url_string, $args);
                        return isset($args['v']) ? $args['v'] : false;
                    }         
                ?>
                <a data-fancybox href="https://www.youtube.com/watch?v=<?= getYouTubeIdFromURL($course->demo_video_links) ?>" class="vidoeArea" style="background-image: url('https://img.youtube.com/vi/<?= getYouTubeIdFromURL($course->demo_video_links) ?>/0.jpg');"><span class="playbtn"></span>
                </a>
                <ul class="coursemeta">
                    <li>
                        <div class="thumb">
                            @if($course->author_image)
                            <img src="{!! asset('users_images/'.$course->author_image) !!}">
                            @else
                            <img src="{!! asset('users_image/no-user-image.gif') !!}">
                            @endif
                        </div>
                        <div class="text">
                            <p>Author</p>
                            <a href="{{ url('search-course?author='.$course->user_id) }}">{{$course->author_name}}</a>
                        </div>
                    </li>
                    <li>
                        <div class="text">
                            <p>Categories</p>
                            <a href="#">{{$course->category_name}}</a>
                        </div>
                    </li>
                    <li>
                        <div class="text">
                            @if(Auth::guard('user')->check())
                            <p>Review  | <a href="#" data-toggle="modal" data-target="#reviewmodal">Write a Review</a></p>
                            <span class="starreview">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </span>
                            @else
                            <p>You need to login for writing a review</p>
                            <span class="starreview">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                            </span>
                            @endif
                            
                        </div>
                    </li>
                </ul>

                <div class="clearfix"></div>

                <div class="couresContantArea">
                    <h4 class="setitle">Overview</h4>
                    {!!$course->overview!!}
                </div>

                <div class="couresContantArea">
                    <h4 class="setitle">Curriculum</h4>
                    {!!$course->curriculum!!}
                </div>

                <div class="couresContantArea">
                    <h4 class="setitle">Prerequisites</h4>
                    {!!$course->prerequisites!!}
                </div>
                
                <div class="couresContantArea">
                    <h4 class="setitle">Summary</h4>
                    {!!$course->summary!!}
                </div>

                <div class="couresContantArea">
                    <h4 class="setitle">Other Details</h4>
                    <h5 class="otherlist"><span>Number of use per lecture</span><span>{{$course->number_of_use_per_lecture}}</span></h5>
                    <h5 class="otherlist"><span>Number of lectures</span><span>{{$course->number_of_lectures}}</span></h5>
                    <h5 class="otherlist"><span>Videotime / lecture</span><span>{{$course->videotime_or_lecture}}</span></h5>
                    <h5 class="otherlist"><span>Number of Modules</span><span>{{$course->number_of_modules}}</span></h5>
                    <h5 class="otherlist"><span>Number of module</span><span>{{$course->number_of_module}}</span></h5>
                    <h5 class="otherlist"><span>Content Medium</span><span>{{$course->content_medium}}</span></h5>
					<?php
						$study_materials = ($course->study_material_sample != '')?json_decode($course->study_material_sample,true):array();
						
					?>
				    <h5 class="otherlist"><span>Study Material Sample</span>
					
					@if(count($study_materials)>0)
					@foreach($study_materials as $material)
					<span>
						<a href="{{ url('/courses_study_material/'.$material) }}" download>Download Sample</a> 
					</span>	
					@endforeach
					@else
						<span>
							No Samples found
						</span>
					@endif
					</h5>
                    <h5 class="otherlist"><span>Certification for course</span><span>{{$course->certification_for_course}}</span></h5>
                </div>

                <div class="clearfix"></div>

                @if(count($course->chapters))
                    @if($course->is_purchased == 1)
                        @foreach($course->chapters as $chapter)
                        <div class="sectionBlock">
                            <h4 class="setitle">Section 1 : {{$chapter->name}}</h4>
                            <ul class="sectioncontent">
                                <!--<li>
                                    <a href="#" class="lessonTitle">Welcome to the Course!</a>
                                    <a href="#" class="lessonPreview">Preview</a>
                                    <div class="fr">
                                        <span class="duration">2 hours</span>
                                        <a class="attachment" data-fancybox data-type="iframe" data-src="https://mozilla.github.io/pdf.js/web/viewer.html" href="javascript:;">PDF File</a>
                                    </div>
                                </li>-->
                                <li>
                                    <a href="javascript:void(0)" class="lessonTitle">{{$chapter->video_title}}</a>
                                    <a href="javascript:void(0)" class="lessonPreview">Preview</a>
                                    <div class="fr">
                                        <span class="duration">2 hours</span>
                                        <a data-fancybox data-type="iframe" data-src="{!! asset('chapters_video/'.$chapter->video) !!}" href="javascript:;" class="attrachmentvideo">Video</a>
                                    </div>
                                </li>
                                <!--<li>
                                    <a href="#" class="lessonTitle">Scope Chains & Closures</a>
                                    <a href="#" class="lessonPreview">Preview</a>
                                    <div class="fr">
                                        <span class="duration">2 hours</span>
                                        <a href="#" class="question" data-fancybox data-src="#hidden-content" href="javascript:;">Questions</a>
                                    </div>
                                </li>-->
                            </ul>
                        </div>
                        @endforeach
                    @else
                        <div class="sectionBlock">
                            <h5>You need to enroll this course to see the chapters.</h5>
                        </div>
                    @endif
                @else
                    <div class="sectionBlock">
                        <h5>No chapters found!</h5>
                    </div>    
                @endif

                <div class="clearfix"></div>

                <div class="review-block">
                    @foreach($reviews as $review)
                        <div class="row">
                        <div class="col-sm-3">
                            <img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded">
                            <div class="review-block-name"><a href="#">{{$review->name}}</a></div>
                            <div class="review-block-date">{{date("d M Y h:i a",strtotime($review->created_at))}}</div>
                        </div>
                        <div class="col-sm-9">
                            <div class="review-block-rate">
                                @if($review->rating == 1)
                                    <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                      <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    </button>
                                    <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
                                      <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    </button>
                                    <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
                                      <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    </button>
                                    <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                      <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    </button>
                                    <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                      <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    </button>
                                @endif
                                @if($review->rating == 2)
                                    <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                      <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    </button>
                                    <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                      <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    </button>
                                    <button type="button" class="btn btn-default btn-xs" aria-label="Left Align">
                                      <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    </button>
                                    <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                      <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    </button>
                                    <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                      <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    </button>
                                @endif
                                @if($review->rating == 3)
                                    <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                      <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    </button>
                                    <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                      <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    </button>
                                    <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                      <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    </button>
                                    <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                      <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    </button>
                                    <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                      <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    </button>
                                @endif
                                @if($review->rating == 4)
                                    <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                      <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    </button>
                                    <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                      <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    </button>
                                    <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                      <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    </button>
                                    <button type="button" class="btn btn-warning btn-grey btn-xs" aria-label="Left Align">
                                      <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    </button>
                                    <button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
                                      <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    </button>
                                @endif
                                @if($review->rating == 5)
                                    <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                      <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    </button>
                                    <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                      <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    </button>
                                    <button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
                                      <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    </button>
                                    <button type="button" class="btn btn-warning btn-grey btn-xs" aria-label="Left Align">
                                      <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    </button>
                                    <button type="button" class="btn btn-warning btn-grey btn-xs" aria-label="Left Align">
                                      <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                                    </button>
                                @endif
                            </div>
                            <div class="review-block-title">{{$review->title}}</div>
                            <div class="review-block-description">{{$review->review}}</div>
                        </div>
                    </div>
                    <hr/>
                    @endforeach
                    
                </div>
				<a  class="btn btn-block btn-social btn-facebook" href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" target="_blank"><i class="fa fa-facebook"></i> Share on Facebook</a>
				<a  class="btn btn-block btn-social btn-twitter" href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}" target="_blank">
					<i class="fa fa-twitter"></i> Share on Twitter
				</a>
				<a class="btn btn-block btn-social btn-google-plus" href="https://plus.google.com/share?url={{ urlencode(Request::fullUrl()) }}" target="_blank">
					<i class="fa fa-google-plus"></i> Share on Google
				</a>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>
<div class="spacer50"></div>

<div class="modal fade" id="reviewmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog reviewmodal" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Write a review for this course</h4>
      </div>
      <div class="modal-body">
        <h4>Rate this course</h4>
        <!-- <div id="stars" class="starrr"></div> -->
        <div class='rating-stars text-center'>
    <ul id='stars'>
      <li class='star' title='Poor' data-value='1'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='Fair' data-value='2'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='Good' data-value='3'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='Excellent' data-value='4'>
        <i class='fa fa-star fa-fw'></i>
      </li>
      <li class='star' title='WOW!!!' data-value='5'>
        <i class='fa fa-star fa-fw'></i>
      </li>
    </ul>
  </div>
        <h4>Review this course</h4>
        <form action="{{ url('write-review') }}" method="post">
            {{ csrf_field() }}
        <input type="hidden" name="rating" class="rating_val" value="">
        <input type="hidden" name="course_id" value="{{$course->id}}">
        <div class="form-group">
          <input type="text" name="title" class="form-control" id="exampleInputEmail1" placeholder="Review Title">
        </div>
        <div class="form-group">
          <textarea name="review" class="form-control" placeholder="Description"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="reviewclosebtn" data-dismiss="modal">Close</button> -->
        <button type="submit" class="reviewbtn">Submit Review</button>
    </form>
      </div>
    </div>
  </div>
</div>

<div class="clearfix"></div>
<div class="spacer50"></div>
<script>
jQuery(function()
{
	jQuery.ajax({
		url:'{{ url("/updateHitCount") }}',
		data:{ 'course_id':'{{$course->id}}','_token':'{{ csrf_token() }}' },
		method:'post'
	})
})

var popupMeta = {
    width: 400,
    height: 400
}
$(document).on('click', '.social-share', function(event){
    event.preventDefault();

    var vPosition = Math.floor(($(window).width() - popupMeta.width) / 2),
        hPosition = Math.floor(($(window).height() - popupMeta.height) / 2);

    var url = $(this).attr('href');
    var popup = window.open(url, 'Social Share',
        'width='+popupMeta.width+',height='+popupMeta.height+
        ',left='+vpPsition+',top='+hPosition+
        ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

    if (popup) {
        popup.focus();
        return false;
    }
});
</script>
@endsection

