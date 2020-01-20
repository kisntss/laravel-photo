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
            <li class="active"><a href="{{ url('/employer') }}/{{ $user->username }}/profile"><span class="flaticon-profile"></span> Profile</a></li>
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
      @if( sizeof($profile) > 0 )
        <form method="post" action="{{ url('/employer') }}/{{ $user->username }}/profile/update" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="my_profile_form_area employer_profile">
            <div class="row">
              <div class="col-lg-12">
                <h4 class="fz20 mb20">Profile</h4>
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
              <div class="col-md-6 col-lg-6">
                <div class="my_profile_input form-group">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" value="{{ $user->email }}" readonly>
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="my_profile_input form-group">
                    <label for="exampleInputPhone">Phone</label>
                    <input type="email" class="form-control" id="exampleInputPhone" aria-describedby="phoneNumber" value="+{{ $country->phonecode }} {{ $user->phone }}" readonly>
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="my_profile_input form-group">
                  <label for="formGroupExampleInput2">Birth of Date</label>
                  <input type="text" class="form-control datepicker" id="formGroupExampleInput2" value="{{ date('Y/m/d', strtotime($profile->birthday)) }}" readonly>
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="my_profile_select_box form-group">
                  <label for="exampleFormControlInput2">Gender</label><br>
                  <input type="text" class="form-control datepicker" id="exampleFormControlInput2" value="{{ $profile->gender }}" readonly>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="my_resume_textarea mt20">
                    <div class="form-group">
                      <label for="exampleFormControlTextarea1">About Me</label>
                      <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="9">{{ $profile->description }}</textarea>
                    </div>
                </div>
              </div>
              <div class="col-lg-12">
                <div class="my_resume_textarea mt20">
                    <div class="form-group">
                      <label for="exampleFormControlInput3">Address</label>
                      <input type="text" class="form-control" id="exampleFormControlInput3" value="{{ $state->name }}, {{ $country->name }}" readonly>
                    </div>
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
        <form method="post" action="{{ url('/employer') }}/{{ $user->username }}/profile/store" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="my_profile_form_area employer_profile">
            <div class="row">
              <div class="col-lg-12">
                <h4 class="fz20 mb20">Profile</h4>
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
                    <input class="btn btn-thm" type='file' id="imageUpload" name="imageUpload" accept=".png, .jpg, .jpeg" multiple/>
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
                    <input type="text" class="form-control" name="fullname" id="formGroupExampleInput1" placeholder="eg. John Doe">
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="my_profile_input form-group">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" value="{{ $user->email }}" readonly>
                </div>
              </div>
              <!-- <div class="col-md-6 col-lg-6">
                <div class="my_profile_input form-group">
                    <label for="exampleInputPhone">Phone</label>
                    <input type="email" class="form-control" id="exampleInputPhone" aria-describedby="phoneNumber" value="{{ $user->phone }}" readonly>
                </div>
              </div> -->
              <div class="col-md-6 col-lg-6">
                <div class="my_profile_input form-group">
                  <label for="formGroupExampleInput2">Birth of Date</label>
                  <input type="text" class="form-control datepicker" name="birthday" id="formGroupExampleInput2" placeholder="2018/02/12">
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
                    <label for="exampleFormControlTextarea1">About Me</label>
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