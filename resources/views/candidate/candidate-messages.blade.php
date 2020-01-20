@extends('app-candidate')
@section('main')
<?php
  $profile = $user->candidate_profile;
  if( sizeof($profile) > 0 ) {
    $country = $profile->country;
    $state = $profile->state;
  } 
?>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
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
            <li class="active"><a href="{{ url('/candidate') }}/{{ $user->username }}/messages"><span class="flaticon-chat"></span> Messages</a></li>
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
      <div class="col-lg-8 col-xl-9">
        <div class="row message_container">
          <div class="col-sm-12 col-md-6 col-lg-5 col-xl-4 pr0 pl0">
            <div class="inbox_user_list">
              <div class="iu_heading">
                <div class="candidate_revew_search_box">
                  <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Serach" aria-label="Search">
                    <button class="btn my-2 my-sm-0" type="submit"><span class="flaticon-search"></span></button>
                  </form>
                </div>
              </div>
              <ul class="inbox_chatting_contact">
                @if( sizeof($contacts) > 0 )
                  @foreach( $contacts as $con )
                    <li class="contact" id="{{ $con->friend_id }}">
                      <a>
                        <div class="wrap">
                          <span class="contact-status online"></span>
                          <img width="20" height="20" class="img-fluid img-thumbnail" src="{{ url('/') }}/{{ $con->avatar }}"/>
                          <div class="meta">
                            <h5 class="name">{{ $con->fullname }}
                              @if( $con->pending )
                                <span class="pending">{{ $con->pending }}</span>
                              @endif
                            <h5>
                            <p class="preview"></p>
                          </div>
                        </div>
                      </a>
                    </li>
                  @endforeach
                @endif
              </ul>
            </div>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-7 col-xl-8 pr0 pl0">
            <div class="user_heading">
              <a href="#">
                <div class="wrap">
                  <span class="contact-status online"></span>
                  <img width="40" height="40" class="img-fluid" src=""/>
                  <div class="meta">
                    <h5 class="name"></h5>
                    <p class="preview"></p>
                  </div>
                </div>
              </a>
            </div>
            <div class="inbox_chatting_box">
              <ul class="chatting_content">
                @if( sizeof($messages) > 0 )
                  @foreach( $messages as $message )
                    @if( $message->from != $user->id )
                      <li class="media sent">
                        <span class="contact-status busy"></span>
                        <img class="img-fluid align-self-start mr-3" src="{{ url('assets/images/team/s6.jpg') }}" alt="s6.jpg"/>
                        <div class="media-body">
                          <div class="date_time">{{ date("d M, g:i a", strtotime($message->created_at)) }}</div>
                          <p>{{ $message->message }}</p>
                        </div>
                      </li>
                    @else
                      <li class="media reply">
                        <div class="media-body text-right">
                          <div class="date_time">{{ date("d M, g:i a", strtotime($message->created_at)) }}</div>
                          <p>{{ $message->message }}</p>
                        </div>
                      </li>
                    @endif
                  @endforeach
                @endif
              </ul>
            </div>
            <div class="message_input">
              <form class="form-inline">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <textarea class="form-control" placeholder="Enter text here..." id="exampleFormControlTextarea1" rows="5"></textarea>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>

$(document).ready( function () {
  var my_id = '{{ $user->id }}';
  var receiver_id = '';

  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;

  var pusher = new Pusher('79a0fc24043fa9a07d29', {
    cluster: 'us3',
    forceTLS: true
  });

  var channel = pusher.subscribe('my-channel');
  
  channel.bind('my-event', function(data) {
    var html = '';
    if(my_id == data.from) {
      html += '<li class="media reply">';
      html += '<div class="media-body text-right">';
      html += '<div class="date_time">' + data.created_at + '</div>'
      html += '<p>' + data.message + '</p>';
      html += '</div></li>';
      $('.chatting_content').append(html);
    } else if(my_id == data.to) {
      if(receiver_id == data.from) {
        // if the receiver is selected, reload the selected user.
        $('#' + data.from).click();
      } else {
        // if the receiver is not selected, add notification for that user.
        var pending = parseInt($('#' + data.from).find('span.pending').html());
        if(pending) {
          $('#' + data.from).find('span.pending').html(pending + 1);
        } else {
          $('#' + data.from).find('h5.name').append('<span class="pending">1</span>');
        }
      }
    }
  });

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('input[name="_token"]').val()
    }
  });

  $(".inbox_chatting_contact li").click( function () {

    var imgSrc = $(this).find('img').attr('src');
    var nameStr = $(this).find('.name').text();
    $('.user_heading').find('img').attr('src', imgSrc);
    $('.user_heading').find('.name').text(nameStr);

    $('.inbox_chatting_contact li').removeClass('active');
    $(this).addClass('active');
    receiver_id = $(this).attr("id");
    
    $.ajax({
      type: 'get',
      url: '{{ url("candidate") }}/{{ $user->username }}/message/get/' + receiver_id,
      data: '',
      cache: false,
      success: function (data) {
        readMessages(data);
        scrollToBottom();
        $(".inbox_chatting_contact li.active").find("span.pending").remove();
      }
    });
  });

  $(document).on('keyup', 'textarea', function (e) {
    var data = $(this).val();
    if( e.keyCode == 13 && data != '' && receiver_id != '' ) {
      $(this).val('');

      $.ajax({
        type: 'post',
        url: '{{ url("candidate") }}/{{ $user->username }}/message/send',
        data: {
          _token: '{{ csrf_token() }}',
          sender_id: my_id,
          receiver_id: receiver_id,
          message: data
        },
        success: function (data) {
          
        },
        error: function (jqXHR, status, err) {

        },
        complete: function () {
          scrollToBottom();
        }
      });
    }
  });

  function scrollToBottom() {
    $('.inbox_chatting_box').animate({
      scrollTop: $('.inbox_chatting_box').get(0).scrollHeight
    }, 1);
  }

  // read message function
  function readMessages(data) {
    var rows = JSON.parse(data);
    var html = '';
    for(var i = 0; i < rows.length; i++) {
      var row = rows[i];
      var created_at = row['created_at'];
      if(row['from'] == my_id && row['to'] == receiver_id) {
        html += '<li class="media reply">';
        html += '<div class="media-body text-right">';
        html += '<div class="date_time">' + row['created_at'] + '</div>'
        html += '<p>' + row['message'] + '</p>';
        html += '</div></li>'
      } else if(row['from'] == receiver_id && row['to'] == my_id) {
        html += '<li class="media sent">';
        html += '<div class="media-body">';
        html += '<div class="date_time">' + row['created_at'] + '</div>'
        html += '<p>' + row['message'] + '</p>';
        html += '</div></li>'
      }
    }
    $('.inbox_chatting_box ul.chatting_content').html(html);
  }
  
});

</script>
@endsection