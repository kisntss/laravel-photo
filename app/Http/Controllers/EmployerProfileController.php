<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateEmployerProfileRequest;
use App\Http\Requests\UpdateEmployerProfileRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\EmployerProfile;
use Illuminate\Support\Facades\Redirect;

class EmployerProfileController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  Request  $request
   * @return Response
   */
  public function store($username, CreateEmployerProfileRequest $request)
  {
    $data = $request->all();
    $address = explode(',', $data['address']);
    $userModel = new User;
    $profileModel = new EmployerProfile;
    $user = $userModel->where('username', $username)->first();
    
    $filename = '';
    if($data['imageUpload'] != '') {
      // image uploading
      $file = $request->file('imageUpload');
      $filename = $file->move('assets/images/employer', $file->getClientOriginalName());
    }
    // data store into the employer_profiles table
    $profileModel = new EmployerProfile;
    $profileModel->user_id = $user['id'];
    $profileModel->fullname = $data['fullname'];
    $profileModel->avatar = $filename;
    $profileModel->birthday = date("Y-m-d", strtotime($data['birthday']));
    $profileModel->gender = $data['gender'];
    $profileModel->country_id = $address[0];
    $profileModel->state_id = $address[1];
    $profileModel->description = $data['description'];
    $profileModel->created_at = date("Y-m-d H:i:s");
    $profileModel->updated_at = date("Y-m-d H:i:s");
    $profileModel->save();

    // return profile page
    $url = '/employer/'.$username.'/profile';
    return Redirect::to($url);
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
      //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  Request  $request
   * @param  int  $id
   * @return Response
   */
  public function update($username, UpdateEmployerProfileRequest $request)
  {
    $data = $request->all();
    $userModel = new User;
    $profileModel = new EmployerProfile;
    $user = $userModel->where('username', $username)->first();

    $filename = '';
    if( isset($data['imageUpload']) ) {
      // image uploading
      $file = $request->file('imageUpload');
      $filename = $file->move('assets/images/employer', $file->getClientOriginalName());
      $profileModel
      ->where('user_id', $user->id)
      ->update(['avatar' => $filename]);
    }
    // data updating
    $profileModel
    ->where('user_id', $user->id)
    ->update([
      'description' => $data['description'],
      'updated_at' => date("Y-m-d H:i:s")
    ]);

    // return profile page
    $url = '/employer/'.$username.'/profile';
    return Redirect::to($url);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
      //
  }
}
