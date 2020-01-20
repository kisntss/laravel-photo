@extends('app')
@section('main')
<!-- Inner Page Breadcrumb -->
<section class="inner_page_breadcrumb bgc-f0 pt30 pb30" aria-label="breadcrumb">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h4 class="breadcrumb_title float-left">Login/Register</h4>
        <ol class="breadcrumb float-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Login/Register</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<!-- Our LogIn Register -->
<section class="our-log-reg bgc-fa">
  <div class="container">
    @if($errors->any())
      @foreach($errors->all() as $error)
      <div class="ui_kit_message_box">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ $error }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
      @endforeach
    @endif
    @if(Session::get('message'))
      @foreach(Session::get('message') as $status => $message)
      <div class="ui_kit_message_box">
        <div class="alert alert-{{ $status }} alert-dismissible fade show" role="alert">
            {{ $message }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </div>
      @endforeach
      {{ Session::forget('message') }}
    @endif
    <div class="row">
      <div class="col-sm-12 col-lg-6">
        <div class="sign_up_form">
          <div class="heading">
            <h3 class="text-center">Quick Login</h3>
            <p class="text-center">Don't have an account? <a class="text-thm" href="#">Sign Up!</a></p>
          </div>
          <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-can-tab" data-toggle="pill" href="#pills-can" role="tab" aria-controls="pills-home" aria-selected="true">Candidate</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-emp-tab" data-toggle="pill" href="#pills-emp" role="tab" aria-controls="pills-profile" aria-selected="false">Employer</a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-can" role="tabpanel" aria-labelledby="pills-can-tab">
              <form action="{{ url('candidate/login') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                </div>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Remember me</label>
                  <a class="tdu text-thm float-right" href="#">Forgot Password?</a>
                </div>
                <button type="submit" class="btn btn-log btn-block btn-thm">Login</button>
                <hr>
                <div class="row mt40">
                  <div class="col-lg">
                    <button type="submit" class="btn btn-block color-white bgc-fb"><i class="fa fa-facebook float-left mt5"></i> Facebook</button>
                  </div>
                  <div class="col-lg">
                    <button type="submit" class="btn btn-block color-white bgc-gogle"><i class="fa fa-google float-left mt5"></i> Google</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="tab-pane fade" id="pills-emp" role="tabpanel" aria-labelledby="pills-emp-tab">
              <form action="{{ url('employer/login') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
                </div>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Remember me</label>
                  <a class="tdu text-thm float-right" href="#">Forgot Password?</a>
                </div>
                <button type="submit" class="btn btn-log btn-block btn-thm">Login</button>
                <hr>
                <div class="row mt40">
                  <div class="col-lg">
                    <button type="submit" class="btn btn-block color-white bgc-fb"><i class="fa fa-facebook float-left mt5"></i> Facebook</button>
                  </div>
                  <div class="col-lg">
                    <button type="submit" class="btn btn-block color-white bgc-gogle"><i class="fa fa-google float-left mt5"></i> Google</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-lg-6">
        <div class="sign_up_form">
          <div class="heading">
            <h3 class="text-center">Create New Account</h3>
            <p class="text-center">Don't have an account? <a class="text-thm" href="#">Sign Up!</a></p>
          </div>
          <ul class="nav nav-pills mb-4" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Candidate</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Employer</a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <form action="{{ url('/candidate/register') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                  <input type="text" class="form-control" id="exampleInputName1" placeholder="User Name" name="username">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="exampleInputPhone1" placeholder="Phone Number" name="phone">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password" name="password">
                </div>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck2">
                  <label class="form-check-label" for="exampleCheck2">By Registering You Confirm That You Accept <a class="text-thm" href="page-terms-and-policies.html">Terms & Conditions</a> And <a class="text-thm" href="page-terms-and-policies.html">Privacy Policy</a></label>
                </div>
                <button type="submit" class="btn btn-log btn-block btn-dark">Register</button>
                <hr>
                <div class="row mt40">
                  <div class="col-lg">
                    <button type="submit" class="btn btn-block color-white bgc-fb"><i class="fa fa-facebook float-left mt5"></i> Facebook</button>
                  </div>
                  <div class="col-lg">
                    <button type="submit" class="btn btn-block color-white bgc-gogle"><i class="fa fa-google float-left mt5"></i> Google</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <form action="{{ url('/employer/register') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                  <input type="text" class="form-control" id="exampleInputName2" placeholder="User Name" name="username">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="exampleInputPhone2" placeholder="Phone Number" name="phone">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" id="exampleInputPassword3" placeholder="Password" name="password">
                </div>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck3">
                  <label class="form-check-label" for="exampleCheck3">By Registering You Confirm That You Accept <a class="text-thm" href="page-terms-and-policies.html">Terms & Conditions</a> And <a class="text-thm" href="page-terms-and-policies.html">Privacy Policy</a></label>
                </div>
                <button type="submit" class="btn btn-log btn-block btn-dark">Register</button>
                <hr>
                <div class="row mt40">
                  <div class="col-lg">
                    <button type="submit" class="btn btn-block color-white bgc-fb"><i class="fa fa-facebook float-left mt5"></i> Facebook</button>
                  </div>
                  <div class="col-lg">
                    <button type="submit" class="btn btn-block color-white bgc-gogle"><i class="fa fa-google float-left mt5"></i> Google</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection