<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="candidates, career, employment, freelance, glassdoor, Human Resource Management, indeed, job board, job listing, job portal, job postings, jobs, listings, recruitment, resume">
  <meta name="CreativeLayers" content="ATFN">
  <!-- css file -->
  <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ url('assets/css/menu.css') }}">
  <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
  <!-- Responsive stylesheet -->
  <link rel="stylesheet" href="{{ url('assets/css/responsive.css') }}">
  <!-- Title -->
  <title>PhotoJob</title>
  <!-- Favicon -->
  <link href="{{ url('assets/images/favicon.ico') }}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
  <link href="{{ url('assets/images/favicon.ico') }}" sizes="128x128" rel="shortcut icon" />
</head>
<body>
<div class="wrapper">
	<div class="preloader"></div>
  <?php
    $profile = $user->employer_profile;
    if( sizeof($profile) > 0 ) {
      $country = $profile->country;
      $state = $profile->state;
    }
  ?>
	<!-- Main Header Nav -->
	<header class="header-nav style_one dashboard_menu dashboard navbar-scrolltofixed main-menu">
		<div class="container">
      <!-- Ace Responsive Menu -->
      <nav>
        <!-- Menu Toggle btn-->
        <div class="menu-toggle">
          <img class="nav_logo_img img-fluid" src="{{ url('assets/images/header-logo.png') }}" alt="header-logo.png">
          <button type="button" id="menu-btn">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <a href="index.html" class="navbar_brand float-left dn-smd">
          <img class="img-fluid" src="{{ url('assets/images/header-logo.png') }}" alt="header-logo.png">
        </a>
        <!-- Responsive Menu Structure-->
        <!--Note: declare the Menu style in the data-menu-style="horizontal" (options: horizontal, vertical, accordion) -->
        <ul id="respMenu" class="ace-responsive-menu" data-menu-style="horizontal">
          <li>
            <a href="{{ url('/my-jobs') }}"><span class="title">My Jobs</span></a>
          </li>
          <li>
            <a href="{{ url('/browse-candidates') }}"><span class="title">Candidates</span></a>
          </li>
          <li>
            <a href=""><span class="title">Pages</span></a>
            <ul>
              <li><a href="">About</a></li>
              <li><a href="">Contact Us</a></li>
              <li><a href="">How It Works</a></li>
              <li><a href="">Packages</a></li>
            </ul>
          </li>
          <li class="last">
            <a href="{{ url('/employer') }}/{{ $user->username }}/post-job"><span class="title">Post a Job</span></a>
          </li>
        </ul>
        <ul class="header_user_notif pull-right dn-smd">
          <li class="user_notif">
            <div class="dropdown">
              <a href="page-candidates-job-alert.html" data-toggle="dropdown"><span class="flaticon-alarm color-white fz20"></span><span>8</span></a>
              <div class="dropdown-menu">
                <div class="so_heading">
                  <p>Notifications</p>
                </div>
                <div class="so_content" data-simplebar="init">
                  <ul>
                    <li>
                      <h5>Candidate suggestion</h5>
                      <p>You might be interested based on your profile.</p>
                    </li>
                    <li>
                      <h5>Candidate suggestion</h5>
                      <p>You might be interested based on your profile.</p>
                    </li>
                    <li>
                      <h5>Candidate suggestion</h5>
                      <p>You might be interested based on your profile.</p>
                    </li>
                    <li>
                      <h5>Candidate suggestion</h5>
                      <p>You might be interested based on your profile.</p>
                    </li>
                    <li>
                      <h5>Candidate suggestion</h5>
                      <p>You might be interested based on your profile.</p>
                    </li>
                    <li>
                      <h5>Candidate suggestion</h5>
                      <p>You might be interested based on your profile.</p>
                    </li>
                    <li>
                      <h5>Candidate suggestion</h5>
                      <p>You might be interested based on your profile.</p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
          <li class="user_setting">
            <div class="dropdown">
              <a class="btn dropdown-toggle" href="#" data-toggle="dropdown">
              @if( sizeof($profile) > 0 )
                <img class="rounded-circle" src="{{ url('/') }}/{{ $profile->avatar }}"> <span class="pl15 pr15">{{ $profile->fullname }}</span>
              @else
                <img class="rounded-circle" src="{{ url('assets/images/avatar.png') }}"> <span class="pl15 pr15">{{ $user->username }}</span>
              @endif
              </a> 
              <div class="dropdown-menu">
                <div class="user_set_header">
                @if( sizeof($profile) > 0 )
                  <p>Hi, {{ $profile->fullname }} <br><span class="address">{{ $state->name }}, {{ $country->sortname }}</span></p>
                @else
                  <p>Hi, {{ $user->username }} <br><span class="address"></span></p>
                @endif
                </div>
                <div class="user_setting_content">
                  <a class="dropdown-item" href="{{ url('/employer') }}/{{ $user->username }}/dashboard"><span class="flaticon-dashboard"></span> Dashboard</a>
                  <a class="dropdown-item" href="{{ url('/employer') }}/{{ $user->username }}/profile"><span class="flaticon-profile"></span> Profile</a>
                  <a class="dropdown-item" href="{{ url('/employer') }}/{{ $user->username }}/post-job"><span class="flaticon-resume"></span> Post a New Job</a>
                  <a class="dropdown-item" href="{{ url('/employer') }}/{{ $user->username }}/manage-jobs"><span class="flaticon-paper-plane"></span> Manage Jobs</a>
                  <a class="dropdown-item" href="{{ url('/employer') }}/{{ $user->username }}/transactions"><span class="flaticon-favorites"></span> Transactions</a>
                  <a class="dropdown-item" href="{{ url('/employer') }}/{{ $user->username }}/messages"><span class="flaticon-chat"></span> Messages</a>
                  <a class="dropdown-item" href="{{ url('/employer') }}/{{ $user->username }}/change-password"><span class="flaticon-locked"></span> Change Password</a>
                  <a class="dropdown-item" href="{{ url('/employer') }}/{{ $user->username }}/logout"><span class="flaticon-alarm"></span> Logout</a>
                  <a class="dropdown-item" href="{{ url('/employer') }}/{{ $user->username }}/delete-profile"><span class="flaticon-rubbish-bin"></span> Delete Profile</a>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </nav>
		</div>
  </header>

  <!-- Main Header Nav For Mobile -->
	<div id="page" class="stylehome1 h0">
		<div class="mobile-menu">
      <ul class="header_user_notif pull-right">
        <li class="user_notif">
          <div class="dropdown">
            <a href="page-candidates-job-alert.html" data-toggle="dropdown"><span class="flaticon-alarm color-white fz20"></span><span>8</span></a>
            <div class="dropdown-menu">
              <div class="so_heading">
                <p>Notifications</p>
              </div>
              <div class="so_content" data-simplebar="init">
                <ul>
                  <li>
                    <h5>Candidate suggestion</h5>
                    <p>You might be interested based on your profile.</p>
                  </li>
                  <li>
                    <h5>Candidate suggestion</h5>
                    <p>You might be interested based on your profile.</p>
                  </li>
                  <li>
                    <h5>Candidate suggestion</h5>
                    <p>You might be interested based on your profile.</p>
                  </li>
                  <li>
                    <h5>Candidate suggestion</h5>
                    <p>You might be interested based on your profile.</p>
                  </li>
                  <li>
                    <h5>Candidate suggestion</h5>
                    <p>You might be interested based on your profile.</p>
                  </li>
                  <li>
                    <h5>Candidate suggestion</h5>
                    <p>You might be interested based on your profile.</p>
                  </li>
                  <li>
                    <h5>Candidate suggestion</h5>
                    <p>You might be interested based on your profile.</p>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </li>
        <li class="user_setting">
          <div class="dropdown">
            <a class="btn dropdown-toggle" href="#" data-toggle="dropdown">
            @if( sizeof($profile) > 0 )
              <img class="rounded-circle" src="{{ url('/') }}/{{ $profile->avatar }}" title="{{ $profile->fullname }}">
            @else
              <img class="rounded-circle" src="{{ url('assets/images/avatar.png') }}" title="{{ $user->username }}">
            @endif
            </a> 
            <div class="dropdown-menu">
              <div class="user_set_header">
              @if( sizeof($profile) > 0 )
                <p>Hi, {{ $profile->fullname }} <br><span class="address">{{ $state->name }}, {{ $country->sortname }}</span></p>
              @else
                <p>Hi, {{ $user->username }} <br><span class="address"></span></p>
              @endif
              </div>
              <div class="user_setting_content">
                <a class="dropdown-item" href="{{ url('/employer') }}/{{ $user->username }}/dashboard"><span class="flaticon-dashboard"></span> Dashboard</a>
                <a class="dropdown-item" href="{{ url('/employer') }}/{{ $user->username }}/profile"><span class="flaticon-profile"></span> Profile</a>
                <a class="dropdown-item" href="{{ url('/employer') }}/{{ $user->username }}/post-job"><span class="flaticon-resume"></span> Post a New Job</a>
                <a class="dropdown-item" href="{{ url('/employer') }}/{{ $user->username }}/manage-jobs"><span class="flaticon-paper-plane"></span> Manage Jobs</a>
                <a class="dropdown-item" href="{{ url('/employer') }}/{{ $user->username }}/transactions"><span class="flaticon-favorites"></span> Transactions</a>
                <a class="dropdown-item" href="{{ url('/employer') }}/{{ $user->username }}/messages"><span class="flaticon-chat"></span> Messages</a>
                <a class="dropdown-item" href="{{ url('/employer') }}/{{ $user->username }}/change-password"><span class="flaticon-locked"></span> Change Password</a>
                <a class="dropdown-item" href="{{ url('/employer') }}/{{ $user->username }}/logout"><span class="flaticon-alarm"></span> Logout</a>
                <a class="dropdown-item" href="{{ url('/employer') }}/{{ $user->username }}/delete-profile"><span class="flaticon-rubbish-bin"></span> Delete Profile</a>
              </div>
            </div>
          </div>
        </li>
      </ul>
			<div class="header stylehome1 dashbord_mobile_logo">
        <img class="nav_logo_img img-fluid float-left mt25" src="{{ url('assets/images/header-logo.png') }}" alt="header-logo.png">
				<a class="bg-thm" href="#menu"><span></span></a>
			</div>
		</div><!-- /.mobile-menu -->
		<nav id="menu" class="stylehome1">
			<ul>
        <li>
          <a href="{{ url('/my-jobs') }}"><span class="title">My Jobs</span></a>
        </li>
        <li>
          <a href="{{ url('/browse-candidates') }}"><span class="title">Candidates</span></a>
        </li>
        <li>
          <a href=""><span class="title">Pages</span></a>
          <ul>
            <li><a href="">About</a></li>
            <li><a href="">Contact Us</a></li>
            <li><a href="">How It Works</a></li>
            <li><a href="">Packages</a></li>
          </ul>
        </li>
        <li class="last">
          <a href="{{ url('/employer') }}/{{ $user->username }}/post-job"><span class="title">Post a Job</span></a>
        </li>
			</ul>
		</nav>
	</div>
  <script src="https://js.pusher.com/4.0/pusher.min.js"></script>
  <script type="text/javascript" src="{{ url('assets/js/jquery.min.js') }}"></script>
  @yield('main')
  <!-- Our Footer Top Area -->
  <section class="footer_top_area p0">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-lg-2 pb25 pt25">
          <div class="logo-widget">
            <img class="img-fluid" src="{{ url('assets/images/header-logo.png') }}" alt="header-logo.png">
          </div>
        </div>
        <div class="col-sm-12 col-lg-6 pb25 pt25 pl60 pr40 brdr_left_right">
          <div class="row">
            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
              <div class="funfact_one">
                <div class="timer">2,395</div>
                <p>Jobs Added</p>
              </div>
            </div>
            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
              <div class="funfact_one">
                <div class="timer">1,267</div>
                <p>Jobs Posted</p>
              </div>
            </div>
            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
              <div class="funfact_one">
                <div class="timer">1,095</div>
                <p>Companies</p>
              </div>
            </div>
            <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
              <div class="funfact_one">
                <div class="timer">7,348</div>
                <p>Freelancer</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-lg-4 pb25 pt25 pl30">
          <div class="footer_social_widget mt15">
            <p class="float-left mt10">Follow Us</p>
            <ul>
              <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="fa fa-instagram"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="fa fa-pinterest"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="fa fa-dribbble"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Our Footer -->
  <section class="footer_one">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-4 col-md-3 col-lg-2">
          <div class="quick_link_widget">
            <h4>Quick Links</h4>
            <ul class="list-unstyled">
              <li><a href="#">Job Packages</a></li>
              <li><a href="#">Post New Job</a></li>
              <li><a href="#">Jobs Listing</a></li>
              <li><a href="#">Jobs Style Grid</a></li>
              <li><a href="#">Employer Listing</a></li>
              <li><a href="#">Employers Grid</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-md-3 col-lg-3">
          <div class="candidate_widget">
            <h4>For Candidates</h4>
            <ul class="list-unstyled">
              <li><a href="#">User Dashboard</a></li>
              <li><a href="#">CV Packages</a></li>
              <li><a href="#">Candidate Listing</a></li>
              <li><a href="#">Candidates Grid</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-4 col-md-4 col-md-3 col-lg-3">
          <div class="employe_widget">
            <h4>For Employers</h4>
            <ul class="list-unstyled">
              <li><a href="#">Post New</a></li>
              <li><a href="#">Job Employer Listing</a></li>
              <li><a href="#">Employers Grid</a></li>
              <li><a href="#">Job Packages</a></li>
              <li><a href="#">Jobs Listing</a></li>
              <li><a href="#">Jobs Style Grid</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-8 col-md-6 col-md-3 col-lg-4">
          <div class="newsletter_widget">
            <h4>Newsletter</h4>
            <p>Subscribe to CareerUp Pacific newsletter to get the latest jobs posted, candidates ,and other latest news stay updated.</p>
            <form class="form-inline mailchimp_form">
              <label class="sr-only" for="inlineFormInputMail2">Name</label>
              <input type="email" class="form-control mb-2 mr-sm-2" id="inlineFormInputMail2" placeholder="Enter your email address">
              <button type="submit" class="btn btn-primary mb-2"><span class="fa fa-paper-plane-o"></span></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Our Footer Bottom Area -->
  <section class="footer_bottom_area p0">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 pb10 pt10">
          <div class="copyright-widget tac-smd mt20">
            <p>© 2019 CareerUp. All Rights Reserved.</p>
          </div>
        </div>
        <div class="col-lg-8 pb10 pt10">
          <div class="footer_menu text-right mt10">
            <ul>
              <li class="list-inline-item"><a href="page-terms-and-policies.html">Site Map</a></li>
              <li class="list-inline-item"><a href="page-terms-and-policies.html">Privacy Policy</a></li>
              <li class="list-inline-item"><a href="page-terms-and-policies.html">Terms of Service</a></li>
              <li class="list-inline-item"><a href="page-terms-and-policies.html">Security & Privacy</a></li>
              <li class="list-inline-item">
                <select class="selectpicker show-tick">
                  <option>English</option>
                  <option>Frenc</option>
                  <option>Italian</option>
                  <option>Spanish</option>
                  <option>Turkey</option>
                </select>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <a class="scrollToHome" href="#"><i class="flaticon-rocket-launch"></i></a>
</div>
<!-- Wrapper End -->
<script type="text/javascript" src="{{ url('assets/js/jquery-3.3.1.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/js/jquery-migrate-3.0.0.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/js/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/js/jquery.mmenu.all.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/js/ace-responsive-menu.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/js/bootstrap-select.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/js/fancybox.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/js/snackbar.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/js/simplebar.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/js/tagsinput.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/js/parallax.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/js/scrollto.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/js/jquery-scrolltofixed-min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/js/jquery.counterup.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/js/wow.min.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/js/progressbar.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/js/slider.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/js/timepicker.js') }}"></script>
<!-- Custom script for all pages --> 
<script type="text/javascript" src="{{ url('assets/js/script.js') }}"></script>
<script type="text/javascript" src="{{ url('assets/js/custom.js') }}"></script>
<script>
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#imagePreview').css('background-image', 'url('+e.target.result +')');
      $('#imagePreview').hide();
      $('#imagePreview').fadeIn(650);
    }
    reader.readAsDataURL(input.files[0]);
	}
}
$("#imageUpload").change(function() {
  readURL(this);
});
</script>
</body>
</html>