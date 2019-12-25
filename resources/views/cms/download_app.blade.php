@extends('layouts.main')

@section('content')
<div class="clearfix"></div>

<div class="appSectionone">
    <div class="container">
        <div class="col-sm-6">
            <div class="mobile"></div>
        </div>
        <div class="col-sm-6 apphome">
            <h1>Disciplemart</h1>
            <p>NOW LEARN ON THE GO , BUY COURSES FROM YOUR PHONE</p>
            <ul>
                <li><a href="#" class="google"></a></li>
                <li><a href="#" class="store"></a></li>
            </ul>
        </div>
    </div>
</div>


<div class="appSectintwo">
    <div class="container">
        <h3><span class="small">About</span> <span class="strong">DISCIPLEMART</span> MOBILE APPLICATION</h3>
        <p>NOW LEARN EVEN WHEN YOU ARE AWAY FROM YOUR COMPUTER.JUST INSTALL DISCIPLEMART MOBILE APPLICATION CONTAINING THOUSANDS OF COURSES IN CA CS CMA GATE CAT AND MANY MORE EXAM PREPARATION. HURRYUP AND INSTALL THE APP TO BOOST YOUR EXAM PREPARATION.</p>
        <ul>
            <li><a href="#">
                <i><img src="{!! asset('design/images/support.svg') !!}"></i>
                <span class="title">SUPPORT</span>
                GET 24*7 SUPPORT IN THE APPLICATION,JUST RAISE A QUEARY AND WE'LL GET IN TOUCH
                </a>
            </li>
            <li><a href="#">
                <i><img src="{!! asset('design/images/smartphone.svg') !!}"></i>
                <span class="title">MULT-DEVICE</span>
                HAVE ACCCOUNT IN DISCIPLEMART?JUST LOG INTOVDISCIPLEMART IN ANY OF YOUR DEVICE ITS ALL THE SAME
                </a>
            </li>
            <li><a href="#">
                <i><img src="{!! asset('design/images/update.svg') !!}"></i>
                <span class="title">UPDATE</span>
                GET THE MOST UPDATED USER INTERFACE AND OPTIONS SO , YOU CAN CHOOSE , SELECT  AND CHECKOUT EASYLY
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="clearfix"></div>

<div class="appSectionthree">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 logapp">
                <img src="{!! asset('design/images/logapp.png') !!}">
            </div>
            <div class="col-sm-5 logcontent">
                <h1>Disciplemart</h1>
                <p>Disciple Mart is a leading online learning platform with a view to cater to the needs of learners with the help of quality learning, in order to sharpen their skills, thereby paving the way to achieve professional and personal goals.  Being a master in the field of online education, Disciple Mart serves any potential learner with an exhaustive library of online top-notch quality courses by eminent industry experts.</p>
            </div>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="appSectionfour">
    <div class="container">
        <h3><span class="small">DISCIPLEMART</span> <span class="strong">LEARN</span> ON THE GO</h3>
        <ul>
            <li>
                <span class="no">1</span>
                <span class="title">EASY UI</span>
            </li>
            <li>
                <span class="no">2</span>
                <span class="title">MORE CHOICES</span>
            </li>
            <li>
                <span class="no">3</span>
                <span class="title">CROSS PLATFORM</span>
            </li>
            <li>
                <span class="no">4</span>
                <span class="title">100% SECURE</span>
            </li>
            <li class="mobileb"></li>
        </ul>
    </div>
</div>

<div class="clearfix"></div>

<div class="appSectionfive">
    <div class="appSectionPic">
        <img src="{!! asset('design/images/app.png') !!}">
    </div>
    <div class="container">
        <h3><span class="strong">Get</span> App</h3>
        <p>Choose your platform and get started!</p>
        <ul>
            <li><a href="#" class="google"></a></li>
            <li><a href="#" class="store"></a></li>
        </ul>
    </div>
</div>

<div class="clearfix"></div>


@endsection