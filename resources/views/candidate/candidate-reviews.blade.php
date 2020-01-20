@extends('app-candidate')
@section('main')
<?php
  $profile = $user->candidate_profile;
  if( sizeof($profile) > 0 ) {
    $country = $profile->country;
    $state = $profile->state;
  }
?>
<!-- Candidate Messages -->
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
            <li class="active"><a href="{{ url('/candidate') }}/{{ $user->username }}/reviews"><span class="flaticon-rating"></span> Reviews</a></li>
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
            <h4 class="fz20 mb30">Reviews</h4>
          </div>
          <div class="col-lg-6">
            <div class="candidate_revew_search_box">
              <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Serach" aria-label="Search">
                <button class="btn my-2 my-sm-0" type="submit"><span class="flaticon-search"></span></button>
              </form>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="candidate_revew_select text-right">
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
          <div class="col-lg-12">
            <div class="candidate_job_reivew">
              <div class="table-responsive job_review_table">
                <table class="table">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Company</th>
                      <th scope="col">Title</th>
                      <th scope="col">Review</th>
                      <th scope="col">Status</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">CreativeLayers</th>
                      <td>Example Head</td>
                      <td>Lorem ıpsum dolar sit amer...</td>
                      <td>Pending</td>
                      <td>
                        <ul class="view_edit_delete_list">
                          <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="View"><span class="flaticon-eye"></span></a></li>
                          <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Edit"><span class="flaticon-edit"></span></a></li>
                          <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-rubbish-bin"></span></a></li>
                        </ul>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">CreativeLayers</th>
                      <td>Example Head</td>
                      <td>Lorem ıpsum dolar sit amer...</td>
                      <td>Pending</td>
                      <td>
                        <ul class="view_edit_delete_list">
                          <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="View"><span class="flaticon-eye"></span></a></li>
                          <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Edit"><span class="flaticon-edit"></span></a></li>
                          <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-rubbish-bin"></span></a></li>
                        </ul>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">CreativeLayers</th>
                      <td>Example Head</td>
                      <td>Lorem ıpsum dolar sit amer...</td>
                      <td>Pending</td>
                      <td>
                        <ul class="view_edit_delete_list">
                          <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="View"><span class="flaticon-eye"></span></a></li>
                          <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Edit"><span class="flaticon-edit"></span></a></li>
                          <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-rubbish-bin"></span></a></li>
                        </ul>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">CreativeLayers</th>
                      <td>Example Head</td>
                      <td>Lorem ıpsum dolar sit amer...</td>
                      <td>Pending</td>
                      <td>
                        <ul class="view_edit_delete_list">
                          <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="View"><span class="flaticon-eye"></span></a></li>
                          <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Edit"><span class="flaticon-edit"></span></a></li>
                          <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-rubbish-bin"></span></a></li>
                        </ul>
                      </td>
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