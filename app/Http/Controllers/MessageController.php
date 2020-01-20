<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Pusher;

class MessageController extends Controller
{
  public function get_message($username, $friend_id) {
    $userModel = new User;
    $user = $userModel->where('username', $username)->first();
    $my_id = $user->id;

    $mesModel = new Message;
    $messages = $mesModel->where(function ($query) use ($my_id, $friend_id) {
      $query->where('from', $my_id)->where('to', $friend_id);
    })->orWhere(function ($query) use ($my_id, $friend_id) {
      $query->where('from', $friend_id)->where('to', $my_id);
    })->get();

    // when read the message, message status set read
    $mesModel->where('from', $friend_id)->where('to', $my_id)->where('is_read', 0)->update(['is_read' => 1]);
      
    return json_encode($messages);
  }

  public function send_message($username, Request $request) {
    $from = $request->sender_id;
    $to = $request->receiver_id;
    $message = $request->message;
    $mesModel = new Message;
    $mesModel->from = $from;
    $mesModel->to = $to;
    $mesModel->message = $message;
    $mesModel->is_read = 0;
    $mesModel->created_at = date("Y-m-d H:i:s");
    $mesModel->save();

    $query = "update 
                message_contacts 
              set updated_at = '" . date("Y-m-d H:i:s") . "' 
              where ( user_id = " . $from . " and friend_id = " . $to . " ) 
                or  ( user_id = " . $to . " and friend_id = " . $from . " )";
    DB::query($query);
    
    $options = array(
      'cluster' => 'us3',
      'useTLS' => true
    );
    $pusher = new Pusher(
      '79a0fc24043fa9a07d29',
      'ad28fb9c5e520d8dc3a0',
      '892326',
      $options
    );
    
    $data = ['from' => $from, 'to' => $to, 'message' => $message, 'created_at' => date("j f, Y H:i a")];
    $pusher->trigger('my-channel', 'my-event', $data);
  }
}
