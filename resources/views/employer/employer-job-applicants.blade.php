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
            <li><a href="{{ url('/employer') }}/{{ $user->username }}/dashboard"><span class="flaticon-dashboard"></span> Dashboard</a></li>
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
      <div class="col-lg-9 col-xl-9">
					
        <div class="row">
          <div class="col-sm-6 col-lg-6">
            <div class="candidate_job_alart_btn">
              <h4 class="fz20 mb15">20 Candidates Found</h4>  
              <button class="btn btn-thm btns dn db-991 float-right">Show Filter</button>
            </div>
          </div>
          <div class="col-sm-6 col-lg-6">
            <div class="candidate_revew_select text-right mt50">
              <ul>
                <li class="list-inline-item">Sort by:</li>
                <li class="list-inline-item">
                  <select class="selectpicker show-tick">
                    <option>Newest</option>
                    <option>Recent</option>
                    <option>Old Review</option>
                  </select>
                </li>
              </ul>
            </div>
          </div>
          @foreach($applicants as $app)
          <div class="col-lg-12">
            <div class="candidate_list_view">
              <div class="thumb">
                <img width="100" class="img-fluid rounded-circle img-thumbnail" src="{{ url('/') }}/{{ $app->avatar }}">
                <div class="cpi_av_rating"><span>4.5</span></div>
              </div>
              <div class="content">
                <h4 class="title">{{ $app->fullname }}</h4>
                <p>{{ $app->title }}</p>
                <ul class="review_list">
                  <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                  <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                </ul>
                <ul class="address_list">
                  <li class="list-inline-item">
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="{{ $app->country_name }}">
                      <h4>Location</h4>
                      <span class="flaticon-location-pin"></span> 
                      {{ $app->state_name }} |
                      <img width="25" src="{{ url('assets/images/flags') }}/{{ $app->sortname }}.svg">
                    </a>
                  </li>
                  <li class="list-inline-item"><a href="#"><h4>Salary</h4> <span class="flaticon-price"></span> </a></li>
                  <li class="list-inline-item"><a href="#"><h4>Job Success</h4> 95%</a></li>
                </ul>
              </div>
              <button class="btn btn-transparent float-right" action="{{ url('employer') }}/{{ $user->username }}/job/{{ $job_id }}/{{ $app->candidate_id }}/award">
                 Award<span class="flaticon-favorites"></span>
              </button>
              <!-- <button class="btn btn-transparent float-right">
                 View Profile<span class="flaticon-right-arrow"></span>
              </button> -->
            </div>
          </div>
          @endforeach
          <div class="col-lg-12">
            <div class="mbp_pagination mt30">
              <ul class="page_navigation">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true"> <span class="flaticon-left-arrow"></span> Previous</a>
                  </li>
                  @for( $page = 1; $page <= $pages; $page++ )
                  @if( $page == $current_page )
                  <li class="page-item active" aria-current="page">
                    <a class="page-link" href="{{ url('employer') }}/{{ $user->username }}/job/{{ $job_id }}/{{ $page }}">{{ $page }} <span class="sr-only">(current)</span></a>
                  </li>
                  @else
                  <li class="page-item"><a class="page-link" href="#">{{ $page }}</a></li>
                  @endif
                  @endfor
                  <li class="page-item">
                    <a class="page-link" href="#">Next <span class="flaticon-right-arrow"></span></a>
                  </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection