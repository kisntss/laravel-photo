@extends('app-candidate')
@section('main')
<?php
  $profile = $user->candidate_profile;
  if( sizeof($profile) > 0 ) {
    $country = $profile->country;
    $state = $profile->state;
  }
?>
<!-- Candidate Dashbord -->
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
              <p>{{ $state->name }}, {{ $country->sortname }}</p>
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
            <li class="active"><a href="{{ url('/candidate') }}/{{ $user->username }}/dashboard"><span class="flaticon-dashboard"></span> Dashboard</a></li>
            <li><a href="{{ url('/candidate') }}/{{ $user->username }}/profile"><span class="flaticon-profile"></span> Profile</a></li>
            <li><a href="{{ url('/candidate') }}/{{ $user->username }}/resume"><span class="flaticon-resume"></span> Resume</a></li>
            <li><a href="{{ url('/candidate') }}/{{ $user->username }}/applied-jobs"><span class="flaticon-paper-plane"></span> Applied Jobs</a></li>
            <li><a href="{{ url('/candidate') }}/{{ $user->username }}/completed-jobs"><span class="flaticon-favorites"></span> Completed Jobs</a></li>
            <li><a href="{{ url('/candidate') }}/{{ $user->username }}/messages"><span class="flaticon-chat"></span> Messages</a></li>
            <li><a href="{{ url('/candidate') }}/{{ $user->username }}/reviews"><span class="flaticon-rating"></span> Reviews</a></li>
            <li><a href="{{ url('/candidate') }}/{{ $user->username }}/recent-jobs"><span class="flaticon-alarm"></span> Recent Jobs</a></li>
            <li><a href="{{ url('/candidate') }}/{{ $user->username }}/change-password"><span class="flaticon-locked"></span> Change Password</a></li>
            <li><a href="{{ url('/candidate') }}/{{ $user->username }}/logout"><span class="flaticon-logout"></span> Logout</a></li>
            <li><a href="{{ url('/candidate') }}/{{ $user->username }}/delete-profile"><span class="flaticon-rubbish-bin"></span> Delete Profile</a></li>
          </ul>
        </div>
        <div class="skill_sidebar_widget">
          <h4>Skills Percentage <span class="float-right font-weight-bold">85%</span></h4>
          <p>Put value for "Cover Image" field to increase your skill up to "15%"</p>
          <ul class="skills">
            <li class="progressbar3" data-width="85" data-target="85"></li>
          </ul>
        </div>
      </div>
      <div class="col-lg-8 col-xl-9">
        <div class="row">
          <div class="col-lg-12">
            <h4 class="mb30">Dashboard</h4>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <div class="ff_one">
              <div class="icon"><span class="flaticon-paper-plane"></span></div>
              <div class="detais">
                <div class="timer">20</div>
                <p>Applied Jobs</p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <div class="ff_one style2">
              <div class="icon"><span class="flaticon-favorites"></span></div>
              <div class="detais">
                <div class="timer">26</div>
                <p>Favorite Jobs</p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <div class="ff_one style3">
              <div class="icon"><span class="flaticon-alarm"></span></div>
              <div class="detais">
                <div class="timer">11</div>
                <p>Job Alerts</p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
            <div class="ff_one style4">
              <div class="icon"><span class="flaticon-tag"></span></div>
              <div class="detais">
                <div class="timer">79</div>
                <p>Packages</p>
              </div>
            </div>
          </div>
          <div class="col-xl-8">
            <div class="recent_job_apply">
              <h4 class="title">Recent Apply Jobs <a class="text-thm float-right" href="#">Browse All Jobs <span class="flaticon-right-arrow"></span></a></h4>
              <div class="rj_grid">
                <h4 class="sub_title">UX/UI Designer</h4>
                <p class="text-thm float-left">Wiggle CRC</p>
                <ul class="rj_post_address float-right">
                  <li class="list-inline-item"><a href="#"><span class="flaticon-location-pin"></span></a></li>
                  <li class="list-inline-item"><a href="#">Bothell, WA, USA</a></li>
                  <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Edit"><span class="flaticon-edit"></span></a></li>
                  <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-rubbish-bin"></span></a></li>
                </ul>
              </div>
              <div class="rj_grid">
                <h4 class="sub_title">Regional Sales Manager South east Asia</h4>
                <p class="text-thm float-left">Wiggle CRC</p>
                <ul class="rj_post_address float-right">
                  <li class="list-inline-item"><a href="#"><span class="flaticon-location-pin"></span></a></li>
                  <li class="list-inline-item"><a href="#">Bothell, WA, USA</a></li>
                  <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Edit"><span class="flaticon-edit"></span></a></li>
                  <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-rubbish-bin"></span></a></li>
                </ul>
              </div>
              <div class="rj_grid">
                <h4 class="sub_title">C Developer (Senior) C .Net</h4>
                <p class="text-thm float-left">Wiggle CRC</p>
                <ul class="rj_post_address float-right">
                  <li class="list-inline-item"><a href="#"><span class="flaticon-location-pin"></span></a></li>
                  <li class="list-inline-item"><a href="#">Bothell, WA, USA</a></li>
                  <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Edit"><span class="flaticon-edit"></span></a></li>
                  <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-rubbish-bin"></span></a></li>
                </ul>
              </div>
              <div class="rj_grid mb0">
                <h4 class="sub_title">UX/UI Designer</h4>
                <p class="text-thm float-left">Wiggle CRC</p>
                <ul class="rj_post_address float-right">
                  <li class="list-inline-item"><a href="#"><span class="flaticon-location-pin"></span></a></li>
                  <li class="list-inline-item"><a href="#">Bothell, WA, USA</a></li>
                  <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Edit"><span class="flaticon-edit"></span></a></li>
                  <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-rubbish-bin"></span></a></li>
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