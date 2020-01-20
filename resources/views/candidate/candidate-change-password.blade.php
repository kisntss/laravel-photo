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
            <li><a href="{{ url('/candidate') }}/{{ $user->username }}/dashboard"><span class="flaticon-dashboard"></span> Dashboard</a></li>
            <li><a href="{{ url('/candidate') }}/{{ $user->username }}/profile"><span class="flaticon-profile"></span> Profile</a></li>
            <li><a href="{{ url('/candidate') }}/{{ $user->username }}/resume"><span class="flaticon-resume"></span> Resume</a></li>
            <li><a href="{{ url('/candidate') }}/{{ $user->username }}/applied-jobs"><span class="flaticon-paper-plane"></span> Applied Jobs</a></li>
            <li><a href="{{ url('/candidate') }}/{{ $user->username }}/completed-jobs"><span class="flaticon-favorites"></span> Completed Jobs</a></li>
            <li><a href="{{ url('/candidate') }}/{{ $user->username }}/messages"><span class="flaticon-chat"></span> Messages</a></li>
            <li><a href="{{ url('/candidate') }}/{{ $user->username }}/reviews"><span class="flaticon-rating"></span> Reviews</a></li>
            <li><a href="{{ url('/candidate') }}/{{ $user->username }}/recent-jobs"><span class="flaticon-alarm"></span> Recent Jobs</a></li>
            <li class="active"><a href="{{ url('/candidate') }}/{{ $user->username }}/change-password"><span class="flaticon-locked"></span> Change Password</a></li>
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
      <div class="col-lg-6 col-xl-6">
        <div class="password_change_form">
          <h4>Change Password</h4>
          <form>
            <div class="form-group">
                <label for="exampleInputPassword1">Old Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="*******">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword2">New Password</label>
                <input type="password" class="form-control" id="exampleInputPassword2" placeholder="*******">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword3">Confirm Password</label>
                <input type="password" class="form-control" id="exampleInputPassword3" placeholder="*******">
            </div>
            <button type="submit" class="btn btn-thm">Save Changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection