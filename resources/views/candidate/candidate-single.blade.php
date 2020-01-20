@extends('app')
@section('main')
<!-- Candidate Personal Info-->
<section class="bgc-fa zi-1 mt65">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-xl-8">
        <div class="candidate_personal_info">
          <div class="thumb">
            <img class="img-fluid rounded-circle" src="{{ url('assets/images/team/cs2.jpg') }}" alt="cs2.jpg">
            <div class="cpi_av_rating"><span>4.5</span></div>
          </div>
          <div class="details">
            <h3>Martha Griffin <small class="verified"><i class="fa fa-check-circle"></i></small></h3>
            <p>Senior UI / UX Designer</p>
            <ul class="address_list">
              <li class="list-inline-item"><a href="#">Wiggle CRC</a></li>
              <li class="list-inline-item"><a href="#"><img src="{{ url('assets/images/resource/usa.png') }}" alt="usa.png"></a></li>
              <li class="list-inline-item"><a href="#">United States</a></li>
            </ul>
            <ul class="review_list">
              <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-xl-4">
        <div class="candidate_personal_overview">
          <ul class="timer_list">
            <li class="list-inline-item"><div class="timer">90</div></li>
            <li class="list-inline-item"><span>%</span></li>
          </ul>
          <p>Job Success</p>
              <ul class="skills">
                  <li class="progressbar3" data-width="85" data-target="90"></li>
              </ul>
              <div class="row mb10">
                <div class="col col-sm-4 col-lg-4">
                  <div class="grid">
                    <div class="price">$84/hr</div>
                    <p>Hourly Rate</p>				        			
                  </div>
                </div>
                <div class="col col-sm-4 col-lg-4 text-center">
                  <div class="grid">
                    <div class="total_job">502 Jobs</div>
                    <p>Done job</p>				        			
                  </div>
                </div>
                <div class="col col-sm-4 col-lg-4 text-right">
                  <div class="grid">
                    <div class="hire">234</div>
                    <p>Rehired</p>				        			
                  </div>
                </div>
              </div>
              <button class="btn btn-block btn-thm"><span class="flaticon-ticket"></span> Make An Offer</button>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Sticky Header -->
<section class="sticky_heading bgc-f3 h80 p0">
  <div class="container">
    <div class="row">
      <div class="col-xl-12">
        <div class="sticky-nav-tabs">
            <div class="sticky-nav-tabs-container">
              <li class="list-inline-item"><a class="sticky-nav-tab" href="#tab-1">About</a></li>
              <li class="list-inline-item"><a class="sticky-nav-tab" href="#tab-2">Education</a></li>
              <li class="list-inline-item"><a class="sticky-nav-tab" href="#tab-3">Work & Experience</a></li>
              <li class="list-inline-item"><a class="sticky-nav-tab" href="#tab-4">Portfolio</a></li>
              <li class="list-inline-item"><a class="sticky-nav-tab" href="#tab-5">Skills</a></li>
              <li class="list-inline-item"><a class="sticky-nav-tab" href="#tab-6">Awards</a></li>
              <li class="list-inline-item"><a class="sticky-nav-tab" href="#tab-7">Feedback</a></li>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Candidate Personal Info Details-->
<section class="bgc-white">
  <div class="container">
    <div class="row">
      <div class="col-xl-8">
        <div class="row">
          <div id="tab-1" class="col-lg-12">
            <div class="candidate_about_info">
              <h4 class="fz20 mb30">About Me</h4>
              <p class="mb30">I’m top rated, highly client-oriented and self-organized UX/UI designer with 3+ years of comprehensive experience working across UX/UI, Web and Graphic Design. Have huge working experience in international teams in collaboration with art director and front-end devs. Have successful experience in startups as well as award-winning redesigns of existing projects.</p>
              <p class="mb40">I take personal responsibility and pay attention to any detail of my work and can greatly help you with:</p>
              <p>-- creating UX/UI for highloaded interface systems: CRM, SaaS, B2B, ERP systems, enterprise solutions and analytical systems with administration panels, dashboards, infographics and compex data</p>
              <p>-- information architecting and creating UX/UI from scratch or low-fidelity wireframes to final visual UI design for web, mobile (iOS, Android) and desktop</p>
              <p>-- product design for large international projects: monitoring and management web applications in health product design for large international projects: monitoring and management web applications in health analytics</p>
              <p class="mt30">The better I do - the better I feel. My aim is to help you to convert the idea into successful product with the most effective, clean and aesthetic design. I'm passionately interested in challenging tasks and researching for intricate results.</p>
            </div>
          </div>
          <div id="tab-2" class="col-lg-12">
            <div class="my_resume_eduarea style2">
              <h4 class="title">Education</h4>
              <div class="content">
                <div class="circle bgc-thm"></div>
                <p class="edu_center">Walters University <small>2002 - 2004</small></p>
                <h4 class="edu_stats">Masters In Fine Arts</h4>
                <p class="mb0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
              </div>
              <div class="content">
                <div class="circle bgc-thm"></div>
                <p class="edu_center">Bachlors in Fine Arts <small>2012 - 2015</small></p>
                <h4 class="edu_stats">Tombers Collage</h4>
                <p class="mb0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
              </div>
              <div class="content">
                <div class="circle bgc-thm"></div>
                <p class="edu_center">Imperieal Institute of Art Direction <small>2014 - 2015</small></p>
                <h4 class="edu_stats">Diploma In Fine Arts</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div id="tab-3" class="my_resume_eduarea style2">
              <h4 class="title">Work & Experience</h4>
              <div class="content">
                <div class="circle bgc-thm"></div>
                <p class="edu_center">Inwave Studio <small>2008 - 2012</small></p>
                <h4 class="edu_stats">Masters In Fine Arts</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
              </div>
              <div class="content style2">
                <div class="circle bgc-thm"></div>
                <p class="edu_center">Wiggle CRC <small>2012 - 2015</small></p>
                <h4 class="edu_stats">CEO Founder</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div id="tab-4" class="row my_resume_portfolio style2">
              <h4 class="title">Portfolio</h4>
              <div class="col-sm-6 col-lg-4">
                <div class="portfolio_item">
                  <a class="lightbox-image" data-fancybox-group="Portfolio Title" href="{{ url('images/gallery/1.jpg') }}">
                    <img class="img-fluid" src="{{ url('assets/images/gallery/1.jpg') }}" alt="1.jpg"/>
                  </a>
                </div>
              </div>
              <div class="col-sm-6 col-lg-4">
                <div class="portfolio_item">
                  <a class="lightbox-image" data-fancybox-group="Portfolio Title" href="{{ url('images/gallery/2.jpg') }}">
                    <img class="img-fluid" src="{{ url('assets/images/gallery/2.jpg') }}" alt="2.jpg"/>
                  </a>
                </div>
              </div>
              <div class="col-sm-6 col-lg-4">
                <div class="portfolio_item">
                  <a class="lightbox-image" data-fancybox-group="Portfolio Title" href="{{ url('images/gallery/3.jpg') }}">
                    <img class="img-fluid" src="{{ url('assets/images/gallery/3.jpg') }}" alt="3.jpg"/>
                  </a>
                </div>
              </div>							
            </div>
          </div>
          <div id="tab-5" class="col-lg-12">
            <div class="candidate_resume_skill">
              <h4 class="title">Skills</h4>
              <!--Progress Levels-->
              <div class="progress-levels">
                <div class="progress-box wow" data-wow-delay="100ms" data-wow-duration="1500ms">
                  <h5 class="box-title">Sketch App</h5>
                  <div class="inner">
                    <div class="bar">
                      <div class="bar-innner"><div class="bar-fill ulockd-bgthm" data-percent="80"><div class="percent"></div></div></div>
                    </div>
                  </div>
                </div>
                <div class="progress-box wow" data-wow-delay="200ms" data-wow-duration="1500ms">
                  <h5 class="box-title">Web Design</h5>
                  <div class="inner">
                    <div class="bar">
                      <div class="bar-innner"><div class="bar-fill ulockd-bgthm" data-percent="90"><div class="percent"></div></div></div>
                    </div>
                  </div>
                </div>
                <div class="progress-box wow" data-wow-delay="200ms" data-wow-duration="1500ms">
                  <h5 class="box-title">Mobile UI Design</h5>
                  <div class="inner">
                    <div class="bar">
                      <div class="bar-innner"><div class="bar-fill ulockd-bgthm" data-percent="60"><div class="percent"></div></div></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div id="tab-6" class="my_resume_eduarea style2">
              <h4 class="title">Awards</h4>
              <div class="content">
                <div class="circle"></div>
                <p class="edu_center">Jan 2018</p>
                <h4 class="edu_stats">Perfect Attendance Programs</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
              </div>
              <div class="content style2">
                <div class="circle"></div>
                <p class="edu_center">Dec 2019</p>
                <h4 class="edu_stats">Top Performer Recognition</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="candidate_review_posted">
              <h4 class="title mb30">Work history and feedback</h4>
              <div class="details bgc-fa">
                <h4>Designer for SaaS analytics app
                  <ul class="review float-right">
                    <li class="list-inline-item"><a class="av_review" href="#">4.5</a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                  </ul>
                </h4>
                <ul class="meta">
                  <li class="list-inline-item"><a href="#"><span class="flaticon-event"></span> 2 days ago</a></li>
                  <li class="list-inline-item"><a href="#">$1,620.00</a></li>
                  <li class="list-inline-item"><a href="#">$27.00 / hr</a></li>
                  <li class="list-inline-item"><a href="#">60 hours</a></li>
                </ul>
                <p>Loved working with Julia. Extremely fast with quality work, took care of everything I asked for! Thank you so much. I will be contacting Julia again in the future for more work, highly.</p>
                <h4 class="mt50">EcoDriving Interface Refinement
                  <ul class="review float-right">
                    <li class="list-inline-item"><a class="av_review" href="#">4.5</a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fa fa-star-o"></i></a></li>
                  </ul>
                </h4>
                <ul class="meta">
                  <li class="list-inline-item"><a href="#"><span class="flaticon-event"></span> 23 August 2018</a></li>
                  <li class="list-inline-item"><a href="#">$1,620.00</a></li>
                  <li class="list-inline-item"><a href="#">$27.00 / hr</a></li>
                  <li class="list-inline-item"><a href="#">60 hours</a></li>
                </ul>
                <p>Julia is a truly gifted designer. She is capable and demonstrated how she can take a few basic sketches of an interface in powerpoint, and turn them into spectacular CSS and beyond.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <h4 id="tab-7" class="title fz20">Leave Your Review</h4>
            <div class="candidate_leave_review text-center">
              <div class="detials">
                <form id="review-form" class="ulockd-mrgn630" action="#" method="post">
                    <h4>What is it like to work at Martha</h4>
                    <div class="star-rating">
                      <input type="radio" name="ratings[1]" id="Overall_5" value="5" class="radio">
                      <label for="Overall_5"></label>
                      <input type="radio" name="ratings[1]" id="Overall_4" value="4" class="radio">
                      <label for="Overall_4"></label>
                      <input type="radio" name="ratings[1]" id="Overall_3" value="3" class="radio">
                      <label for="Overall_3"></label>
                      <input type="radio" name="ratings[1]" id="Overall_2" value="2" class="radio">
                      <label for="Overall_2"></label>
                      <input type="radio" name="ratings[1]" id="Overall_1" value="1" class="radio">
                      <label for="Overall_1"></label>
                    </div>
                  <div class="form-group text-left">
                      <label class="title" for="name2">Review Title</label>
                      <input class="form-control" type="text" name="name2" id="name2" value="">
                  </div>
                  <div class="form-group text-left">
                      <label class="control-label title" for="review">Review Content</label>
                      <textarea class="form-control" rows="5" name="review" id="review"></textarea>
                    <a href="#" class="btn btn-lg btn-thm">Submit Review <span class="flaticon-right-arrow"></span></a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4">
        <div class="candidate_working_widget bgc-fa">
          <div class="icon text-thm"><span class="flaticon-controls"></span></div>
          <div class="details">
            <h4>Experience</h4>
            <p>6-9 Years</p>
          </div>
          <div class="icon text-thm"><span class="flaticon-old-age-man"></span></div>
          <div class="details">
            <h4>Age</h4>
            <p>27 Years</p>
          </div>
          <div class="icon text-thm"><span class="flaticon-paper"></span></div>
          <div class="details">
            <h4>Languages</h4>
            <p>English, Turkish, Hindi</p>
          </div>
          <div class="icon text-thm"><span class="flaticon-mortarboard"></span></div>
          <div class="details">
            <h4>Education</h4>
            <p>Certificate</p>
          </div>
        </div>
        <div class="candidate_social_widget bgc-fa">
          <ul>
            <li>Social Profiles</li>
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
        <h4 class="fz20 mb30">Attachments</h4>
        <div class="candidate_document_widget">
          <div class="details">
          <div class="icon"><span class="flaticon-doc"></span></div>
            <h4 class="title">Cover Letter</h4>
            <p>PDF</p>
          </div>
        </div>
        <div class="candidate_document_widget">
          <div class="icon"><span class="flaticon-doc"></span></div>
          <div class="details">
            <h4 class="title">Contrac</h4>
            <p>DOCX</p>
          </div>
        </div>
        <h4 class="fz20 mb30">Contact Martha Griffin</h4>
        <div class="candidate_contact_form bgc-fa">
          <form>
            <div class="form-group">
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Your Name">
            </div>
              <div class="form-group">
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Your Email">
              </div>
            <div class="form-group">
                <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Subject">
            </div>
            <div class="form-group">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Message"></textarea>
            </div>
              <button type="submit" class="btn btn-block btn-thm">Send Now <span class="flaticon-right-arrow"></span></button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection