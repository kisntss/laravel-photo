@extends('app-candidate')
@section('main')
<?php
  $profile = $user->candidate_profile;
  if( sizeof($profile) > 0 ) {
    $country = $profile->country;
    $state = $profile->state;
  }
?>
<!-- Candidate Resume -->
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
              <p><span class="flaticon-location-pin"></span> {{ $country->sortname }}.<img width="20" height="20" class="img rounded-circle" src="{{ url('assets/images/flags/4x3') }}/{{ $country->sortname }}.svg"></p>
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
            <li><a href="{{ url('/candidate') }}/{{ $user->username }}/dashboard"><span class="flaticon-dashboard"></span> Dashboard</a></li>
            <li><a href="{{ url('/candidate') }}/{{ $user->username }}/profile"><span class="flaticon-profile"></span> Profile</a></li>
            <li><a href="{{ url('/candidate') }}/{{ $user->username }}/resume"><span class="flaticon-resume"></span> Resume</a></li>
            <li class="active"><a href="{{ url('/candidate') }}/{{ $user->username }}/applied-jobs"><span class="flaticon-paper-plane"></span> Applied Jobs</a></li>
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
      <div class="col-sm-12 col-lg-8 col-xl-9">
        <div class="row">
          <div class="col-lg-12">
            <h4 class="fz18 mb30">Applied Jobs</h4>
          </div>
          <div class="col-lg-12">
            <div class="mbp_pagination">
              <ul class="page_navigation">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1" aria-disabled="true"> <span class="flaticon-left-arrow"></span> Previous</a>
                </li>
                @for( $page = 1; $page <= $pages; $page++ )
                @if( $page == $current_page )
                <li class="page-item active" aria-current="page">
                  <a class="page-link" href="{{ url('candidate') }}/{{ $user->username }}/applied-jobs/{{ $page }}">{{ $page }} <span class="sr-only">(current)</span></a>
                </li>
                @else
                <a class="page-link" href="{{ url('candidate') }}/{{ $user->username }}/applied-jobs/{{ $page }}">{{ $page }}</a>
                @endif
                @endfor
                <li class="page-item">
                  <a class="page-link" href="#">Next <span class="flaticon-right-arrow"></span></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <hr>
        <div class="row applyed_job">
        @foreach( $jobs as $job )
          <div class="col-sm-12 col-lg-12">
            <div class="fj_post">
              <div class="details">
                <div class="row">
                  <div class="col-sm-4 col-lg-2">
                    <div class="thumb fn-smd">
                      <img width="60" height="60" class="img-thumbnail" src="{{ url('/') }}/{{ $job->avatar }}">
                    </div>
                  </div>
                  <div class="col-sm-8 col-lg-10">
                    <h4>{{ $job->title }}</h4>
                    <p>Posted {{ date("j F, Y", strtotime($job->created_at)) }} by 
                      <a class="text-thm" href="#">{{ $job->fullname }}</a>
                    </p>
                    <ul class="featurej_post">
                      <li class="list-inline-item">
                        <span class="flaticon-location-pin"></span>
                        <a data-toggle="tooltip" data-placement="top" title="{{ $job->name }}"><img width="20" height="20" src="{{ url('assets/images/flags/4x3') }}/{{ $job->sortname }}.svg" alt="{{ $job->name }}"></a>
                      </li>
                      <li class="list-inline-item">
                        <span class="flaticon-price pl20"></span>
                        <a href="#">{{ $job->min_salary }} - {{ $job->max_salary }}</a>
                      </li>
                    </ul>
                  </div>
                  <ul class="view_edit_delete_list float-right">
                    <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Edit"><span class="flaticon-edit"></span></a></li>
                    <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-rubbish-bin"></span></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
@endsection