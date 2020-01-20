<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateCandidateProfileRequest;
use App\Http\Requests\UpdateCandidateProfileRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\CandidateProfile;
use Illuminate\Support\Facades\Redirect;

class CandidateProfileController extends Controller
{
  public function post_profile($username, CreateCandidateProfileRequest $request) {
    $data = $request->all();
    $address = explode(',', $data['address']);
    $userModel = new User;
    $profileModel = new CandidateProfile;
    $user = $userModel->where('username', $username)->first();
    
    $filename = '';
    if($data['imageUpload'] != '') {
      // image uploading
      $file = $request->file('imageUpload');
      $filename = $file->move('assets/images/candidate', $file->getClientOriginalName());
    }

    // data store into the candidate_profiles table
    $profileModel = new CandidateProfile;
    $profileModel->user_id = $user['id'];
    $profileModel->fullname = $data['fullname'];
    $profileModel->avatar = $filename;
    $profileModel->current_salary = $data['current_salary'];
    $profileModel->expected_salary = $data['expected_salary'];
    $profileModel->experience = $data['experience'];
    $profileModel->birthday = date("Y-m-d", strtotime($data['birthday']));
    $profileModel->gender = $data['gender'];
    $profileModel->country_id = $address[0];
    $profileModel->state_id = $address[1];
    $profileModel->description = $data['description'];
    $profileModel->created_at = date("Y-m-d H:i:s");
    $profileModel->updated_at = date("Y-m-d H:i:s");
    $profileModel->save();

    // return profile page
    $url = '/candidate/'.$username.'/profile';
    return Redirect::to($url);
  }

  public function update_profile($username, UpdateCandidateProfileRequest $request) {
    $data = $request->all();
    $userModel = new User;
    $profileModel = new CandidateProfile;
    $user = $userModel->where('username', $username)->first();
    
    print_r($request->file('imageUplaod'));
    $filename = '';
    if( isset($data['imageUpload']) ) {
      // image uploading
      $file = $request->file('imageUpload');
      $filename = $file->move('assets/images/candidate', $file->getClientOriginalName());
      $profileModel
      ->where('user_id', $user->id)
      ->update(['avatar' => $filename]);
    }

    // data updating
    $profileModel
    ->where('user_id', $user->id)
    ->update([
      'current_salary' => $data['current_salary'],
      'expected_salary' => $data['expected_salary'],
      'experience' => $data['experience'],
      'description' => $data['description'],
      'updated_at' => date("Y-m-d H:i:s")
    ]);
  
    // return profile page
    $url = '/candidate/'.$username.'/profile';
    return Redirect::to($url);
  }
 
}
