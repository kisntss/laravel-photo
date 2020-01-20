@extends('app-employer')
@section('main')
<?php
  $profile = $user->employer_profile;
  if( sizeof($profile) > 0 ) {
    $country = $profile->country;
    $state = $profile->state;
  }
?>
<!-- Employer Dashbord -->
<section class="our-dashbord dashbord">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-lg-4 col-xl-3 dn-smd">
        <div class="user_profile">
          <div class="media">
          @if( sizeof($profile) > 0 )
            <img src="{{ url('/') }}/{{ $profile->avatar }}" class="align-self-start mr-3 rounded-circle">
            <div class="media-body">
              <p class="mt-0" style="font-size: 14px; font-weight: bold;">Hi, {{ $profile->fullname }}</p>
              <p>{{ $country->sortname }} <img width="20" height="20" calss="rounded-circle" src="{{ url('assets/images/flags') }}/{{ $country->sortname }}.svg"></p>
            </div>
          @else
            <img src="{{ url('assets/images/avatar.png') }}" class="align-self-start mr-3 rounded-circle">
            <div class="media-body">
              <p class="mt-0" style="font-size: 14px; font-weight: bold;">Hi, {{ $user->username }}</p>
            </div>
          @endif
          </div>
        </div>
        <div class="dashbord_nav_list">
          <ul>
            <li class="active"><a href="{{ url('/employer') }}/{{ $user->username }}/dashboard"><span class="flaticon-dashboard"></span> Dashboard</a></li>
            <li><a href="{{ url('/employer') }}/{{ $user->username }}/profile"><span class="flaticon-profile"></span> Profile</a></li>
            <li><a href="{{ url('/employer') }}/{{ $user->username }}/post-job"><span class="flaticon-resume"></span> Post a New Job</a></li>
            <li><a href="{{ url('/employer') }}/{{ $user->username }}/active-jobs"><span class="flaticon-paper-plane"></span> Active Jobs</a></li>
            <li><a href="{{ url('/employer') }}/{{ $user->username }}/current-jobs"><span class="flaticon-work"></span> Current Jobs</a></li>
            <li><a href="{{ url('/employer') }}/{{ $user->username }}/past-jobs"><span class="flaticon-job"></span> Past Jobs</a></li>
            <li><a href="{{ url('/employer') }}/{{ $user->username }}/transactions"><span class="flaticon-favorites"></span> Transactions</a></li>
            <li><a href="{{ url('/employer') }}/{{ $user->username }}/messages"><span class="flaticon-chat"></span> Messages</a></li>
            <li><a href="{{ url('/employer') }}/{{ $user->username }}/reviews"><span class="flaticon-rating"></span> Reviews</a></li>
            <li><a href="{{ url('/employer') }}/{{ $user->username }}/change-password"><span class="flaticon-locked"></span> Change Password</a></li>
            <li><a href="{{ url('/employer') }}/{{ $user->username }}/logout"><span class="flaticon-alarm"></span> Logout</a></li>
            <li><a href="{{ url('/employer') }}/{{ $user->username }}/delete-profile"><span class="flaticon-rubbish-bin"></span> Delete Profile</a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-12 col-lg-8 col-xl-9">
        <div class="row">
          <div class="col-lg-12">
            <h4 class="mb30">Dashboard</h4>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <div class="ff_one">
              <div class="icon"><span class="flaticon-paper-plane"></span></div>
              <div class="detais">
                <div class="timer">5246</div>
                <p>Posted Jobs</p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <div class="ff_one style2">
              <div class="icon"><span class="flaticon-favorites"></span></div>
              <div class="detais">
                <div class="timer">107</div>
                <p>Reviewed</p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <div class="ff_one style3">
              <div class="icon"><span class="flaticon-alarm"></span></div>
              <div class="detais">
                <div class="timer">835</div>
                <p>Shortlisted</p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <div class="ff_one style4">
              <div class="icon"><span class="flaticon-tag"></span></div>
              <div class="detais">
                <div class="timer">279</div>
                <p>Interviews</p>
              </div>
            </div>
          </div>
          <div class="col-xl-8">
            <div class="recent_job_apply">
              <h4 class="title">Recent Applicants</h4>
              <div class="candidate_list_view style3 mb50">
                <div class="thumb">
                  <img class="img-fluid rounded-circle" src="{{ url('assets/images/team/1.jpg') }}" alt="1.jpg">
                  <div class="cpi_av_rating"><span>4.5</span></div>
                </div>
                <div class="content">
                  <h4 class="title">Ali TUFAN<span class="verified text-thm pl10"><i class="fa fa-check-circle"></i></span></h4>
                  <p>App Designer</p>
                  <ul class="review_list">
                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                  </ul>
                </div>
                  <ul class="freelancer_place mt25 float-right fn-xsd tac-xsd">
                  <li class="list-inline-item"><a href="#"><span class="flaticon-location-pin"></span> Istanbul</a></li>
                  <li class="list-inline-item"><a href="#"><button class="btn btn-thm">Hire</button></a></li>
                  </ul>
              </div>
              <div class="candidate_list_view style3 mb50">
                <div class="thumb">
                  <img class="img-fluid rounded-circle" src="{{ url('assets/images/team/c4.jpg') }}" alt="c4.jpg">
                  <div class="cpi_av_rating"><span>4.5</span></div>
                </div>
                <div class="content">
                  <h4 class="title">Peter KING<span class="verified text-thm pl10"><i class="fa fa-check-circle"></i></span></h4>
                  <p>iOS Expert + Node Dev</p>
                  <ul class="review_list">
                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                  </ul>
                </div>
                  <ul class="freelancer_place mt25 float-right fn-xsd tac-xsd">
                  <li class="list-inline-item"><a href="#"><span class="flaticon-location-pin"></span> Istanbul</a></li>
                  <li class="list-inline-item"><a href="#"><button class="btn btn-thm">Hire</button></a></li>
                  </ul>
              </div>
              <div class="candidate_list_view style3">
                <div class="thumb">
                  <img class="img-fluid rounded-circle" src="{{ url('assets/images/team/c2.jpg') }}" alt="c2.jpg">
                  <div class="cpi_av_rating"><span>4.5</span></div>
                </div>
                <div class="content">
                  <h4 class="title">Nateila JOHN<span class="verified text-thm pl10"><i class="fa fa-check-circle"></i></span></h4>
                  <p>Front-End Developer</p>
                  <ul class="review_list">
                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                  </ul>
                </div>
                  <ul class="freelancer_place mt25 float-right fn-xsd tac-xsd">
                  <li class="list-inline-item"><a href="#"><span class="flaticon-location-pin"></span> Istanbul</a></li>
                  <li class="list-inline-item"><a href="#"><button class="btn btn-thm">Hire</button></a></li>
                  </ul>
              </div>
            </div>
          </div>
          <div class="col-xl-4">
            <div class="recent_job_activity">
              <h4 class="title">Activity</h4>
              <div class="grid">
                <div class="color_bg float-left"></div>
                <ul>
                  <li><span>Dobrick </span>published an article</li>
                  <li>2 hours ago</li>
                </ul>
              </div>
              <div class="grid">
                <div class="color_bg two float-left"></div>
                <ul>
                  <li><span>Stella </span>created an event</li>
                  <li>2 hours ago</li>
                </ul>
              </div>
              <div class="grid">
                <div class="color_bg three float-left"></div>
                <ul>
                  <li><span>Peter </span>submitted the reports</li>
                  <li>2 hours ago</li>
                </ul>
              </div>
              <div class="grid">
                <div class="color_bg four float-left"></div>
                <ul>
                  <li><span>Nateila </span>updated the docs</li>
                  <li>2 hours ago</li>
                </ul>
              </div>
              <div class="grid">
                <div class="color_bg float-left"></div>
                <ul>
                  <li><span>Dobrick </span>published an article</li>
                  <li>2 hours ago</li>
                </ul>
              </div>
              <div class="grid mb0">
                <div class="color_bg two float-left"></div>
                <ul>
                  <li><span>Stella </span>created an event</li>
                  <li>2 hours ago</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection