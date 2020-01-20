@extends('app-candidate')
@section('main')
<?php
  $profile = $user->candidate_profile;
  if( sizeof($profile) > 0 ) {
    $country = $profile->country;
    $state = $profile->state;
  }
  $educations = $user->candidate_educations;
  $experiences = $user->candidate_experiences;
  $portfolios = $user->candidate_portfolios;
  $awards = $user->candidate_awards;
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
            <li class="active"><a href="{{ url('/candidate') }}/{{ $user->username }}/resume"><span class="flaticon-resume"></span> Resume</a></li>
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
        <div class="my_profile_form_area employer_profile">
          <div class="row">
            <div class="col-lg-12">
              <h4 class="fz20 mb20">My Resume</h4>
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
              <div class="my_resume_eduarea">
                <h4 class="title">Education <small class="float-right"><a href="#"  data-toggle="modal" data-target="#educationNewModalCenter" class="edu_new">Add New <span class="flaticon-right-arrow"></span></a></small></h4>
                @if( sizeof($educations) > 0 )
                @foreach($educations as $edu)
                <div class="content">
                  <div class="circle"></div>
                  <p class="edu_center edu_academy">{{ $edu->academy }}</p> <small class="edu_year">{{ $edu->year }}</small>
                  <h4 class="edu_stats edu_title">{{ $edu->title }}
                    <ul class="edu_stats_list float-right">
                      <li class="list-inline-item"><a href="#" data-toggle="modal" data-target="#educationModalCenter" class="edu_edit"><span class="flaticon-edit"></span></a></li>
                      <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Delete" class="edu_remove"><span class="flaticon-rubbish-bin"></span></a></li>
                    </ul>
                  </h4>
                  <p class="edu_description">{{ $edu->description }}</p>
                </div>
                @endforeach
                @endif
              </div>
            </div>
            <div class="col-lg-12">
              <div class="my_resume_eduarea">
                <h4 class="title">Work & Experience <small class="float-right"><a href="#"  data-toggle="modal" data-target="#experienceNewModalCenter" class="exp_new">Add New <span class="flaticon-right-arrow"></span></a></small></h4>
                @if( sizeof($experiences) > 0 )
                @foreach($experiences as $exp)
                <div class="content">
                  <div class="circle"></div>
                  <p class="edu_center exp_company">{{ $exp->company }}</p> <small class="exp_year">{{ $exp->year }}</small>
                  <h4 class="edu_stats exp_title">{{ $exp->title }}
                    <ul class="edu_stats_list float-right">
                      <li class="list-inline-item"><a href="#" data-toggle="modal" data-target="#experienceModalCenter" class="exp_edit"><span class="flaticon-edit"></span></a></li>
                      <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-rubbish-bin"></span></a></li>
                    </ul>
                  </h4>
                  <p class="exp_description">{{ $exp->description }}</p>
                </div>
                @endforeach
                @endif
              </div>
            </div>
            <div class="col-lg-12">
              <div class="row my_resume_portfolio">
                <h4 class="title">Portfolio</h4>
                @if( sizeof($portfolios) > 0 )
                @foreach($portfolios as $pof)
                <div class="col-sm-6 col-lg-3">
                  <div class="portfolio_item">
                    <img class="img-fluid" src="{{ url('/') }}/{{ $pof->url }}" alt="1.jpg">
                    <ul class="edu_stats_list">
                      <li class="list-inline-item"><a href="{{ url('/candidate') }}/{{ $user->username }}/resume/pof/remove/{{ $pof->id }}" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-rubbish-bin"></span></a></li>
                    </ul>
                  </div>
                </div>
                @endforeach
                @endif
                <div class="col-lg-12">
                  <form action="{{ url('/candidate') }}/{{ $user->username }}/resume/pof/pof-upload" enctype="multipart/form-data" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="avatar-upload mb30">
                      <div class="avatar-edit">
                        <input class="btn btn-thm" type='file' id="imageUpload" name="pofUpload" accept=".png, .jpg, .jpeg" />
                        <label for="imageUpload"></label>
                      </div>
                      <div class="avatar-preview">
                        <div id="imagePreview"></div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-danger">Upload</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="my_resume_skill">
                <h4 class="title">Skills</h4>
                <input type="text" data-role="tagsinput" value="Sketch App,User Interface Design,Graphic Design,Web Design" placeholder="Add Skills">
              </div>
            </div>
            <div class="col-lg-12">
              <div class="my_resume_eduarea">
                <h4 class="title">Awards <small class="float-right"><a href="#"  data-toggle="modal" data-target="#awardNewModalCenter" class="awd_new">Add New <span class="flaticon-right-arrow"></span></a></small></h4>
                @if( sizeof($awards) > 0 )
                @foreach($awards as $awd)
                <div class="content">
                  <div class="circle"></div>
                  <p class="edu_center awd_year">{{ $awd->year }}</p>
                  <h4 class="edu_stats awd_award">{{ $awd->award }}
                    <ul class="edu_stats_list float-right">
                      <li class="list-inline-item"><a href="#" data-toggle="modal" data-target="#awardModalCenter" class="awd_edit"><span class="flaticon-edit"></span></a></li>
                      <li class="list-inline-item"><a href="#" data-toggle="tooltip" data-placement="top" title="Delete"><span class="flaticon-rubbish-bin"></span></a></li>
                    </ul>
                  </h4>
                  <p class="awd_description">{{ $awd->description }}</p>
                </div>
                @endforeach
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Modal -->
<div class="modal fade" id="educationModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="text-center">Education</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="login_form">
        <form action="{{ url('/candidate') }}/{{ $user->username }}/resume/edu/edit" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label for="exampleInput1">Title</label>
            <input type="text" class="form-control edu_title_modal" name="title" id="exampleInput1">
          </div>
          <div class="form-group">
            <label for="exampleInput2">Year</label>
            <input type="text" class="form-control edu_year_modal" name="year" id="exampleInput2" >
          </div>
          <div class="form-group">
            <label for="exampleInput3">Academy</label>
            <input type="text" class="form-control edu_academy_modal" name="academy" id="exampleInput3">
          </div>
          <hr>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control edu_description_modal" name="description" id="exampleFormControlTextarea1" rows="9"></textarea>
          </div>
          <hr>
          <button type="submit" class="btn btn-log btn-block btn-thm">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="educationNewModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="text-center">New Education</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="login_form">
        <form action="{{ url('/candidate') }}/{{ $user->username }}/resume/edu/create" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label for="exampleInput1">Title</label>
            <input type="text" class="form-control" name="title" id="exampleInput1">
          </div>
          <div class="form-group">
            <label for="exampleInput2">Year</label>
            <input type="text" class="form-control" name="year" id="exampleInput2" placeholder="ex. 2018 - 2019">
          </div>
          <div class="form-group">
            <label for="exampleInput3">Academy</label>
            <input type="text" class="form-control" name="academy" id="exampleInput3">
          </div>
          <hr>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control edu_description_modal" name="description" id="exampleFormControlTextarea1" rows="9"></textarea>
          </div>
          <hr>
          <button type="submit" class="btn btn-log btn-block btn-thm">Add</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="experienceModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="text-center">Work & Experience</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="login_form">
        <form action="{{ url('/candidate') }}/{{ $user->username }}/resume/exp/edit" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label for="exampleInput1">Title</label>
            <input type="text" class="form-control exp_title_modal" name="title" id="exampleInput1">
          </div>
          <div class="form-group">
            <label for="exampleInput2">Year</label>
            <input type="text" class="form-control exp_year_modal" name="year" id="exampleInput2" >
          </div>
          <div class="form-group">
            <label for="exampleInput3">Company</label>
            <input type="text" class="form-control exp_company_modal" name="company" id="exampleInput3">
          </div>
          <hr>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control exp_description_modal" name="description" id="exampleFormControlTextarea1" rows="9"></textarea>
          </div>
          <hr>
          <button type="submit" class="btn btn-log btn-block btn-thm">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="experienceNewModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="text-center">New Work & Experience</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="login_form">
        <form action="{{ url('/candidate') }}/{{ $user->username }}/resume/exp/create" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label for="exampleInput1">Title</label>
            <input type="text" class="form-control" name="title" id="exampleInput1">
          </div>
          <div class="form-group">
            <label for="exampleInput2">Year</label>
            <input type="text" class="form-control" name="year" id="exampleInput2" placeholder="ex. 2018 - 2019">
          </div>
          <div class="form-group">
            <label for="exampleInput3">Company</label>
            <input type="text" class="form-control" name="company" id="exampleInput3">
          </div>
          <hr>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control exp_description_modal" name="description" id="exampleFormControlTextarea1" rows="9"></textarea>
          </div>
          <hr>
          <button type="submit" class="btn btn-log btn-block btn-thm">Add</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="awardModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="text-center">Awards</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="login_form">
        <form action="{{ url('/candidate') }}/{{ $user->username }}/resume/awd/edit" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label for="exampleInput1">Award</label>
            <input type="text" class="form-control awd_award_modal" name="award" id="exampleInput1">
          </div>
          <div class="form-group">
            <label for="exampleInput2">Year</label>
            <input type="text" class="form-control awd_year_modal" name="year" id="exampleInput2" >
          </div>
          <hr>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control awd_description_modal" name="description" id="exampleFormControlTextarea1" rows="9"></textarea>
          </div>
          <hr>
          <button type="submit" class="btn btn-log btn-block btn-thm">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="awardNewModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="text-center">New Awards</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="login_form">
        <form action="{{ url('/candidate') }}/{{ $user->username }}/resume/awd/create" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="form-group">
            <label for="exampleInput1">Award</label>
            <input type="text" class="form-control" name="award" id="exampleInput1">
          </div>
          <div class="form-group">
            <label for="exampleInput2">Year</label>
            <input type="text" class="form-control" name="year" id="exampleInput2" placeholder="ex. 2018">
          </div>
          <hr>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control awd_description_modal" name="description" id="exampleFormControlTextarea1" rows="9"></textarea>
          </div>
          <hr>
          <button type="submit" class="btn btn-log btn-block btn-thm">Add</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection