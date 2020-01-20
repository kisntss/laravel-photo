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
            <li><a href="{{ url('/employer') }}/{{ $user->username }}/profile"><span class="flaticon-profile"></span> Profile</a></li>
            <li><a href="{{ url('/employer') }}/{{ $user->username }}/post-job"><span class="flaticon-resume"></span> Post a New Job</a></li>
            <li><a href="{{ url('/employer') }}/{{ $user->username }}/active-jobs"><span class="flaticon-paper-plane"></span> Active Jobs</a></li>
            <li><a href="{{ url('/employer') }}/{{ $user->username }}/current-jobs"><span class="flaticon-work"></span> Current Jobs</a></li>
            <li><a href="{{ url('/employer') }}/{{ $user->username }}/past-jobs"><span class="flaticon-job"></span> Past Jobs</a></li>
            <li class="active"><a href="{{ url('/employer') }}/{{ $user->username }}/transactions"><span class="flaticon-favorites"></span> Transactions</a></li>
            <li><a href="{{ url('/employer') }}/{{ $user->username }}/messages"><span class="flaticon-chat"></span> Messages</a></li>
            <li><a href="{{ url('/employer') }}/{{ $user->username }}/change-password"><span class="flaticon-locked"></span> Change Password</a></li>
            <li><a href="{{ url('/employer') }}/{{ $user->username }}/logout"><span class="flaticon-alarm"></span> Logout</a></li>
            <li><a href="{{ url('/employer') }}/{{ $user->username }}/delete-profile"><span class="flaticon-rubbish-bin"></span> Delete Profile</a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-12 col-lg-8 col-xl-9">
        <div class="row">
          <div class="col-lg-12">
            <h4 class="fz20 mb30">Transactions</h4>
          </div>
          <div class="col-lg-12">
            <div class="candidate_job_reivew style2">
              <div class="table-responsive job_review_table mt0">
                <table class="table">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Package ID</th>
                      <th scope="col">Title</th>
                      <th scope="col">Payment Date</th>
                      <th scope="col">Payment Type</th>
                      <th scope="col">Amount</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">221319456</th>
                      <td>Advertise job - Supper Jobs</td>
                      <td>April 04, 2019</td>
                      <td>Pre Bank Transfer</td>
                      <td>$99</td>
                      <td>Pending</td>
                    </tr>
                    <tr>
                      <th scope="row">221319456</th>
                      <td>CV Search - Unlimited CV Pack</td>
                      <td>April 04, 2019</td>
                      <td>Pre Bank Transfer</td>
                      <td>$150</td>
                      <td class="text-thm2">Approved</td>
                    </tr>
                    <tr>
                      <th class="active" scope="row">221319456</th>
                      <td>Advertise job - Golden Package</td>
                      <td>April 04, 2019</td>
                      <td>Pre Bank Transfer</td>
                      <td>$124</td>
                      <td class="text-thm2">Approved</td>
                    </tr>
                    <tr>
                      <th scope="row">221319456</th>
                      <td>Advertise job - Supper Jobs</td>
                      <td>April 04, 2019</td>
                      <td>Pre Bank Transfer</td>
                      <td>$117</td>
                      <td>Pending</td>
                    </tr>
                    <tr>
                      <th scope="row">221319456</th>
                      <td>Golden Jobs</td>
                      <td>April 04, 2019</td>
                      <td>Pre Bank Transfer</td>
                      <td>$8.956</td>
                      <td>Pending</td>
                    </tr>
                    <tr>
                      <th scope="row">221319456</th>
                      <td>Advertise job - Supper Jobs</td>
                      <td>April 04, 2019</td>
                      <td>Pre Bank Transfer</td>
                      <td>$10.568</td>
                      <td>Pending</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection