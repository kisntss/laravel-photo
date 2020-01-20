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
            <li class="active"><a href="{{ url('/employer') }}/{{ $user->username }}/past-jobs"><span class="flaticon-job"></span> Past Jobs</a></li>
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
            <h4 class="mb30">Past Jobs</h4>
          </div>
          <div class="col-lg-12 col-sm-12">
            <div class="cnddte_fvrt_job candidate_job_reivew style2">
              <div class="ui_kit_tab mt30">
                <div class="mbp_pagination">
                  <ul class="page_navigation">
                    <li class="page-item disabled">
                      <a class="page-link" href="#" tabindex="-1" aria-disabled="true"> <span class="flaticon-left-arrow"></span> Previous</a>
                    </li>
                    @for( $page = 1; $page <= $pages; $page++ )
                    @if($page == $current_page)
                    <li class="page-item active" aria-current="page">
                      <a class="page-link" href="{{ url('employer') }}/{{ $user->username }}/past-jobs/{{ $page }}">{{ $page }} 
                        <span class="sr-only">(current)</span>
                      </a>
                    </li>
                    @else
                    <li class="page-item"><a class="page-link" href="{{ url('employer') }}/{{ $user->username }}/past-jobs/{{ $page }}">{{ $page }}</a></li>
                    @endif
                    @endfor
                    <li class="page-item">
                      <a class="page-link" href="#">Next <span class="flaticon-right-arrow"></span></a>
                    </li>
                  </ul>
                </div>
                <div class="table-responsive job_review_table job_current_table">
                  <table class="table">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Job Title</th>
                        <th scope="col">Applicant</th>
                        <th scope="col">Salary</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($jobs as $job)
                      <tr>
                        <th scope="row">
                          <h4>{{ $job->title }}</h4>
                          <ul>
                            <li class="list-inline-item"><a href="#"><span class="flaticon-event"> Created: </span></a></li>
                            <li class="list-inline-item"><a class="color-black22" href="#">{{ date("F d, Y", strtotime($job->created_at)) }}</a></li>
                          </ul>
                          <ul>
                            <li class="list-inline-item"><a href="#"><span class="flaticon-event"> Award: </span></a></li>
                            <li class="list-inline-item"><a class="color-black22" href="#">{{ date("F d, Y", strtotime($job->awarded_at)) }}</a></li>
                          </ul>
                          <ul>
                            <li class="list-inline-item"><a href="#"><span class="flaticon-event"> Completed: </span></a></li>
                            <li class="list-inline-item"><a class="color-black22" href="#">{{ date("F d, Y", strtotime($job->completed_at)) }}</a></li>
                          </ul>
                        </th>
                        <td class="text-center">
                          <ul>
                            <li class="list-inline-item">
                              <a data-toggle="tooltip" data-placement="left" title="{{ $job->fullname }}">
                                <img with="50" height="50" class="rounded-circle" src="{{ url('/') }}/{{ $job->avatar }}">
                              </a>
                            </li>
                            <li class="list-inline-item">
                              <a data-toggle="tooltip" data-placement="right" title="{{ $job->country_name }}">
                                <img width="30" height="30" src="{{ url('assets/images/flags') }}/{{ $job->sortname }}.svg">
                              </a>
                            </li>
                          </ul>
                        </td>
                        <td class="text-thm2">${{ $job->salary }} (USD)</td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection