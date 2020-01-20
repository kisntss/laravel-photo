@extends('app-employer')
@section('main')
<?php
  $profile = $user->employer_profile;
  if( sizeof($profile) > 0 ) {
    $country = $profile->country;
    $state = $profile->state;
  }
?>
<!-- Employer Post a New Job -->
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
            <li><a href="{{ url('/employer') }}/{{ $user->username }}/dashboard"><span class="flaticon-dashboard"></span> Dashboard</a></li>
            <li><a href="{{ url('/employer') }}/{{ $user->username }}/profile"><span class="flaticon-profile"></span> Profile</a></li>
            <li class="active"><a href="{{ url('/employer') }}/{{ $user->username }}/post-job"><span class="flaticon-resume"></span> Post a New Job</a></li>
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
        <form role="form" method="post" action="{{ url('/employer') }}/{{ $user->username }}/job/create" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="my_profile_form_area">
            <div class="row">
              <div class="col-lg-12">
                <h4 class="fz20 mb20">Post a New Job</h4>
              </div>
              <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <div class="icon_boxs">
                  <div class="icon"><span class="flaticon-work"></span></div>
                  <div class="details"><h4>2 Job Posted</h4></div>
                </div>
              </div>
              <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <div class="icon_boxs">
                  <div class="icon style2"><span class="flaticon-resume"></span></div>
                  <div class="details"><h4>3 Applications</h4></div>
                </div>
              </div>
              <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                <div class="icon_boxs">
                  <div class="icon style3"><span class="flaticon-work"></span></div>
                  <div class="details"><h4>1 Active Jobs</h4></div>
                </div>
              </div>
              <div class="col-lg-12 mt30">
                <div class="my_profile_thumb_edit"></div>
              </div>
              <div class="col-lg-12">
                <div class="my_profile_input form-group">
                  <label for="formGroupExampleInput2">Job Title</label>
                  <input type="text" class="form-control" name="title" id="formGroupExampleInput2" placeholder="UX/UI Desginer">
                </div>
              </div>
              <div class="col-lg-12">
                <div class="my_resume_textarea">
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Job Description</label>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="9"></textarea>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-lg-12">
                <div class="my_profile_input form-group">
                  <label for="formGroupExampleInputDate">Job Deadline Date</label>
                  <input type="text" class="form-control datepicker" name="deadline" id="formGroupExampleInputDate" placeholder="22/05/2010">
                </div>
              </div>
              <div class="col-md-12 col-lg-12">
                <div class="my_profile_select_box form-group">
                  <label for="formGroupExampleInput2">Job Type</label><br>
                  <select class="selectpicker" name="job_type">
                    <option value="basic">Basic</option>
                    <option value="standard">Standard</option>
                    <option value="advance">Advance</option>
                    <option value="expert">Expert</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="my_profile_input form-group">
                  <label for="formGroupExampleInput3">Min Salary (USD)</label><br>
                  <input type="number" name="min_salary" id="formGroupExampleInput3" class="form-control">
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="my_profile_input form-group">
                  <label for="exampleFormControlInput4">Max Salary (USD)</label><br>
                  <input type="number" name="max_salary" id="formGroupExampleInput4" class="form-control">
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="my_profile_select_box form-group">
                  <label for="formGroupExampleInput1">Experience</label><br>
                  <select class="selectpicker" name="experience">
                    <option value="1,2">1Year to 2Year</option>
                    <option value="3,4">3Year to 4Year</option>
                    <option value="5,6">5Year to 6Year</option>
                    <option value="6,+">6Year Over</option>
                  </select>
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="my_profile_select_box form-group">
                  <label for="formGroupExampleInput1">Gender</label><br>
                  <select class="selectpicker" name="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-12">
                <h4 class="fz18 mb20">Address / Location</h4>
              </div>
              <div class="col-md-12 col-lg-12">
                <div class="my_profile_select_box form-group ui-kit-select-search">
                  <label for="exampleFormControlInput9">Address</label><br>
                  <select class="selectpicker" data-live-search="true" name="address" id="address-select">
                    <option value=""></option>
                    @foreach($countries as $country)
                      @foreach($country->states as $state)
                        <option value="{{ $country->id }},{{ $state->id }}">{{ $state->name }}, {{ $country->name }}</option>
                      @endforeach
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="my_profile_input">
                  <button type="submit" class="btn btn-lg btn-thm">Save Changes</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection