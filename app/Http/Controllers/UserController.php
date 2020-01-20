<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreateCandidateRequest;
use App\Http\Requests\CreateEmployerRequest;
use App\Http\Requests\GetCandidateRequest;
use App\Http\Requests\GetEmployerRequest;

class UserController extends Controller
{
  public function candidate_register(CreateCandidateRequest $request) {
    $data = $request->all();
    $canModel = new Candidate;
    $canModel->username = $data['username'];
    $canModel->email = $data['email'];
    $canModel->password = Hash::make($data['password']);
    $canModel->role = 4;
    $canModel->created_at = date("Y-m-d H:i:s");
    $canModel->updated_at = date("Y-m-d H:i:s");
    $canModel->save();
    Session::put('message', ['success' => 'New Candidate created successsfully.']);

    return Redirect::to('/sign');
  }
  public function employer_register(CreateEmployerRequest $request) {
    $data = $request->all();
    $empModel = new User;
    $empModel->username = $data['username'];
    $empModel->email = $data['email'];
    $empModel->password = Hash::make($data['password']);
    $empModel->role = 3;
    $empModel->created_at = date("Y-m-d H:i:s");
    $empModel->updated_at = date("Y-m-d H:i:s");
    $empModel->save();
    Session::put('message', ['success' => 'New Employer created successsfully.']);

    return Redirect::to('/sign');
  }
  public function candidate_login(GetCandidateRequest $request) {
    $data = $request->all();
    $canModel = new User;
    $candidate = $canModel->where('email', $data['email'])->where('role', 4)->first();
    if( sizeof($candidate) > 0 ) {
      if( Hash::check($data['password'], $candidate['password']) ) {
        Session::put('user', $candidate);
        $redirect = '/candidate/'.$candidate['username'].'/dashboard';
        return Redirect::to($redirect);
      }
    }
    Session::put('message', ['warning' => 'Your email or password are uncorrect.']);
    return Redirect::to('/sign');
  }
  public function employer_login(GetEmployerRequest $request) {
    $data = $request->all();
    $empModel = new User;
    $employer = $empModel->where('email', $data['email'])->where('role', 3)->first();
    if( sizeof($employer) > 0 ) {
      if( Hash::check($data['password'], $employer['password']) ) {
        Session::put('user', $employer);
        $redirect = '/employer/'.$employer['username'].'/dashboard';
        return Redirect::to($redirect);
      }
    }
    Session::put('message', ['warning' => 'Your email or password are uncorrect.']);
    return Redirect::to('/sign');
  }
}
