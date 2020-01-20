@extends('app-candidate')
@section('main')
<?php
  $profile = $user->candidate_profile;
  if( sizeof($profile) > 0 ) {
    $country = $profile->country;
    $state = $profile->state;
  }
?>
<!-- Candidate Profile -->
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
            <li class="active"><a href="{{ url('/candidate') }}/{{ $user->username }}/profile"><span class="flaticon-profile"></span> Profile</a></li>
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
      <div class="col-sm-12 col-lg-8 col-xl-9">
        @if(sizeof($profile) > 0)
        <form  method="post" action="{{ url('/candidate') }}/{{ $user->username }}/profile/update-profile" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="my_profile_form_area employer_profile">
            <div class="row">
              <div class="col-lg-12">
                <h4 class="fz20 mb20">My Profile</h4>
              </div>
              @if($errors->any())
                @foreach($errors->all() as $error)
                <div class="col-lg-12 col-md-12">
                  <div class="ui_kit_message_box">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $error }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  </div>
                </div>
                @endforeach
              @endif
              <div class="col-lg-12">
                <div class="avatar-upload mb30">
                  <div class="avatar-edit">
                    <input class="btn btn-thm" type='file' id="imageUpload" name="imageUpload" accept=".png, .jpg, .jpeg" />
                    <label for="imageUpload"></label>
                  </div>
                  <div class="avatar-preview">
                    <div id="imagePreview"></div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="my_profile_thumb_edit"></div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="my_profile_input form-group">
                  <label for="formGroupExampleInput1">Full Name</label>
                  <input type="text" class="form-control" id="formGroupExampleInput1" value="{{ $profile->fullname }}" readonly>
                </div>
              </div>
              <!-- <div class="col-md-6 col-lg-6">
                <div class="my_profile_input form-group">
                  <label for="exampleInputPhone">Phone</label>
                  <input type="text " class="form-control" value="+{{ $country->phonecode }} {{ $user->phone }}" id="exampleInputPhone" aria-describedby="phoneNumber" readonly>
                </div>
              </div> -->
              <div class="col-md-6 col-lg-6">
                <div class="my_profile_input form-group">
                  <label for="exampleFormControlInput1">Email address</label>
                  <input type="email" class="form-control" value="{{ $user->email }}" id="exampleFormControlInput1" readonly>
                </div>
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="my_profile_input form-group">
                  <label for="exampleFormControlInput3">Current Salary($/hr)</label><br>
                  <input type="number" class="form-control" id="exampleFormControlInput3" name="current_salary" value="{{ $profile->current_salary }}">
                </div>
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="my_profile_input form-group">
                  <label for="exampleFormControlInput4">Expected Salary($/hr)</label><br>
                  <input type="number" class="form-control" id="exampleFormControlInput4" name="expected_salary" value="{{ $profile->expected_salary }}">
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="my_profile_input form-group">
                  <label for="exampleFormControlInput5">Experience(Year)</label><br>
                  <input type="number" class="form-control" id="exampleFormControlInput5" name="experience" value="{{ $profile->experience }}">
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="my_profile_input form-group">
                  <label for="exampleFormControlInput6">Birth Of Date</label><br>
                  <input type="text" class="form-control datepicker" id="exampleFormControlInput6" value="{{ $profile->birthday }}" readonly>
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="my_profile_input form-group ui-kit-select-search">
                  <label for="exampleFormControlInput7">Gender</label><br>
                  <input type="text" class="form-control" id="exampleFormControlInput7" value="{{ $profile->gender }}" readonly>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="my_profile_textarea mt20">
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="9">{{ $profile->description }}</textarea>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <h4 class="fz18 mb20">Contact Information</h4>
              </div>
              <div class="col-md-12 col-lg-12">
                <div class="my_profile_input form-group ui-kit-select-search">
                  <label for="exampleFormControlInput9">Address</label><br>
                  <input type="text" class="form-control" id="exampleFormControlInput9" value="{{ $state->name }}, {{ $country->name }}" readonly>
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
        @else
        <form method="post" action="{{ url('/candidate') }}/{{ $user->username }}/profile/post-profile" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="my_profile_form_area employer_profile">
            <div class="row">
              <div class="col-lg-12">
                <h4 class="fz20 mb20">My Profile</h4>
              </div>
              @if($errors->any())
                @foreach($errors->all() as $error)
                <div class="col-lg-12 col-md-12">
                  <div class="ui_kit_message_box">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $error }}
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                  </div>
                </div>
                @endforeach
              @endif
              <div class="col-lg-12">
                <div class="avatar-upload mb30">
                  <div class="avatar-edit">
                    <input class="btn btn-thm" type='file' id="imageUpload" name="imageUpload" accept=".png, .jpg, .jpeg" />
                    <label for="imageUpload"></label>
                  </div>
                  <div class="avatar-preview">
                    <div id="imagePreview"></div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="my_profile_thumb_edit"></div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="my_profile_input form-group">
                  <label for="formGroupExampleInput1">Full Name</label>
                  <input type="text" class="form-control" id="formGroupExampleInput1" name="fullname" placeholder="Martha Griffin">
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="my_profile_input form-group">
                  <label for="exampleInputPhone">Phone</label>
                  <input type="text " class="form-control" value="{{ $user->phone }}" id="exampleInputPhone" name="phone" aria-describedby="phoneNumber" readonly>
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="my_profile_input form-group">
                  <label for="exampleFormControlInput1">Email address</label>
                  <input type="email" class="form-control" value="{{ $user->email }}" id="exampleFormControlInput1" name="email" readonly>
                </div>
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="my_profile_input form-group">
                  <label for="exampleFormControlInput3">Current Salary($/hr)</label><br>
                  <input type="number" class="form-control" id="exampleFormControlInput3" name="current_salary" placeholder="30">
                </div>
              </div>
              <div class="col-md-6 col-lg-3">
                <div class="my_profile_input form-group">
                  <label for="exampleFormControlInput4">Expected Salary($/hr)</label><br>
                  <input type="number" class="form-control" id="exampleFormControlInput4" name="expected_salary" placeholder="30">
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="my_profile_input form-group">
                  <label for="exampleFormControlInput5">Experience(Year)</label><br>
                  <input type="number" class="form-control" id="exampleFormControlInput5" name="experience" placeholder="5">
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="my_profile_input form-group">
                  <label for="exampleFormControlInput6">Birth Of Date</label><br>
                  <input type="text" class="form-control datepicker" id="exampleFormControlInput6" name="birthday" placeholder="1998/03/23">
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="my_profile_select_box form-group ui-kit-select-search">
                  <label for="exampleFormControlInput7">Gender</label><br>
                  <select class="selectpicker" name="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="my_resume_textarea mt20">
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="9" placeholder="Input description here..."></textarea>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">
                <h4 class="fz18 mb20">Contact Information</h4>
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
        @endif
      </div>
    </div>
  </div>
</section>
@endsection