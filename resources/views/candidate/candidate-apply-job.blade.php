@extends('app-candidate')
@section('main')
<?php
  $employer = $job->employer;
  $emp_profile = $employer->employer_profile;
  $emp_country = $emp_profile->country;
  $emp_state = $emp_profile->state;
?>
<!-- Job Single Page Section -->
<section class="job_single_v5_banner mt-30"></section>

<!-- Job Single Page Section -->
<section class="bgc-fa pt40">
  <div class="container">
    <div class="row">
      <div class="col-xl-8 offset-xl-2">
        <div class="row">
          <div class="col-lg-12">
            <div class="candidate_personal_info mbt45 style2 job_singe_v5">
              <div class="thumb one text-center">
                <img class="img-thumbnail rounded-circle" width="120" src="{{ url('/') }}/{{ $emp_profile->avatar }}">
              </div>
              <div class="details">
                <h3>{{ $job->title }}</h3>
                <p class="mb0">Qiwo Smartlink Technology</p>
                <ul class="address_list">
                  <li class="list-inline-item"><a href="#"><span class="flaticon-location-pin"></span> {{ $emp_state->name }}, {{ $emp_country->name }}</a></li>
                  <li class="list-inline-item"><a href="#"><span class="flaticon-price"></span> ${{ $job->min_salary }} - {{ $job->max_salary }} (USD) fixed</a></li>
                </ul>
                <a class="mt25" href="#">View all jobs <span class="flaticon-right-arrow pl10"></span></a>
              </div>
            </div>
          </div>
        </div>
        @if( sizeof($apply) == 0 )
        <div class="row job_meta_list mt30 mb30">
          <form role="form" class="col-md-12" action="{{ url('/candidate') }}/{{ $user->username }}/job/{{ $job->id }}/apply" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="my_profile_form_area employer_profile">
              <div class="col-md-6 col-lg-6">
                <div class="my_profile_input form-group">
                  <label for="formGroupExampleInput1">Expected Salary $ (USD)</label>
                  <input type="number" class="form-control" name="salary" id="formGroupExampleInput1" placeholder="ex. $20 (USD)" required>
                </div>
              </div>
              <div class="col-md-6 col-lg-6">
                <div class="my_profile_input form-group">
                  <label for="formGroupExampleInput1">Timeline (Days)</label>
                  <input type="number" class="form-control" name="timeline" id="formGroupExampleInput1" placeholder="ex. 20 days" required>
                </div>
              </div>
              <div class="col-sm-4 col-lg-4">
                <button type="submit" class="btn btn-block btn-thm">Apply Now <span class="flaticon-right-arrow pl10"></span></button>
              </div>
            </div>
          </form>
        </div>
        @endif
        <div class="row">
          <div class="col-lg-12">
            <div class="candidate_about_info style2 mt10">
              <h4 class="fz20 mb30">Job Description</h4>
              <p class="mb30">{{ $job->description }}</p>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="my_resume_eduarea">
              <h4 class="title mb20">Applied Candidates</h4>
            </div>
          </div>
          @if( sizeof($applicants) > 0 )
          @foreach($applicants as $applicant)
          <div class="col-lg-12">
            <div class="fj_post style2 one">
              <div class="details">
                <h5 class="job_chedule text-thm2">Timeline - {{ $applicant->timeline }} days</h5>
                <div class="thumb fn-smd">
                  <img class="img rounded" width="80" src="{{ url('/') }}/{{ $applicant->avatar }}">
                </div>
                <h4>{{ $applicant->fullname }}</h4>
                <ul class="featurej_post">
                  <li class="list-inline-item">
                    <span class="flaticon-location-pin"></span>
                    <a href="#">{{ $applicant->state_name }}, {{ $applicant->country_name }}</a>
                    <img src="{{ url('/assets/images') }}/{{ $applicant->country_name }}" class="img-thumbnail" alt="">
                  </li>
                  <li class="list-inline-item"><span class="flaticon-price pl20"></span> <a href="#">${{ $applicant->salary }} (USD) fixed</a></li>
                </ul>
              </div>
              <a class="favorit" href="#"><span class="flaticon-favorites"></span></a>
            </div>
          </div>
          @endforeach
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
@endsection