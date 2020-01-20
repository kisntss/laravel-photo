<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateCandidateEducationRequest;
use App\Http\Requests\UpdateCandidateEducationRequest;
use App\Http\Requests\CreateCandidateExperienceRequest;
use App\Http\Requests\UpdateCandidateExperienceRequest;
use App\Http\Requests\CreateCandidateAwardRequest;
use App\Http\Requests\UpdateCandidateAwardRequest;
use App\Http\Requests\UploadPortfolioRequest;
use App\Http\Controllers\Controller;
use App\Models\CandidateEducation;
use App\Models\CandidateExperience;
use App\Models\CandidateAward;
use App\Models\CandidatePortfolio;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class CandidateResumeController extends Controller
{
  /**
   * This controller is candidate's resume controller
   */

  // create education data
  public function edu_create($username, CreateCandidateEducationRequest $request) {
    $data = $request->all();
    $userModel = new User;
    $user = $userModel->where('username', $username)->first();
    $eduModel = new CandidateEducation;
    $eduModel->user_id = $user->id;
    $eduModel->title = $data['title'];
    $eduModel->academy = $data['academy'];
    $eduModel->year = $data['year'];
    $eduModel->description = $data['description'];
    $eduModel->created_at = date("Y-m-d H:i:s");
    $eduModel->updated_at = date("Y-m-d H:i:s");
    $eduModel->save();

    // return resume page
    $url = '/candidate/'.$username.'/resume';
    return Redirect::to($url);
  }

  // update education data
  public function edu_edit($username, UpdateCandidateEducationRequest $request) {
    $data = $request->all();
    $userModel = new User;
    $eduModel = new CandidateEducation;
    $user = $userModel->where('username', $username)->first();

    // data updating
    $eduModel
    ->where('user_id', $user->id)
    ->update([
      'title' => $data['title'],
      'academy' => $data['academy'],
      'year' => $data['year'],
      'description' => $data['description'],
      'updated_at' => date("Y-m-d H:i:s")
    ]);

    // return resume page
    $url = '/candidate/'.$username.'/resume';
    return Redirect::to($url);
  }

  // create experience data
  public function exp_create($username, CreateCandidateExperienceRequest $request) {
    $data = $request->all();
    $userModel = new User;
    $user = $userModel->where('username', $username)->first();
    $expModel = new CandidateExperience;
    $expModel->user_id = $user->id;
    $expModel->title = $data['title'];
    $expModel->company = $data['company'];
    $expModel->year = $data['year'];
    $expModel->description = $data['description'];
    $expModel->created_at = date("Y-m-d H:i:s");
    $expModel->updated_at = date("Y-m-d H:i:s");
    $expModel->save();

    // return resume page
    $url = '/candidate/'.$username.'/resume';
    return Redirect::to($url);
  }

  // update experience data
  public function exp_edit($username, UpdateCandidateExperienceRequest $request) {
    $data = $request->all();
    $userModel = new User;
    $expModel = new CandidateExperience;
    $user = $userModel->where('username', $username)->first();

    // data updating
    $expModel
    ->where('user_id', $user->id)
    ->update([
      'title' => $data['title'],
      'company' => $data['company'],
      'year' => $data['year'],
      'description' => $data['description'],
      'updated_at' => date("Y-m-d H:i:s")
    ]);

    // return resume page
    $url = '/candidate/'.$username.'/resume';
    return Redirect::to($url);
  }

  // create experience data
  public function awd_create($username, CreateCandidateAwardRequest $request) {
    $data = $request->all();
    $userModel = new User;
    $user = $userModel->where('username', $username)->first();
    $awdModel = new CandidateAward;
    $awdModel->user_id = $user->id;
    $awdModel->award = $data['award'];
    $awdModel->year = $data['year'];
    $awdModel->description = $data['description'];
    $awdModel->created_at = date("Y-m-d H:i:s");
    $awdModel->updated_at = date("Y-m-d H:i:s");
    $awdModel->save();

    // return resume page
    $url = '/candidate/'.$username.'/resume';
    return Redirect::to($url);
  }

  // update experience data
  public function awd_edit($username, UpdateCandidateAwardRequest $request) {
    $data = $request->all();
    $userModel = new User;
    $awdModel = new CandidateAward;
    $user = $userModel->where('username', $username)->first();

    // data updating
    $awdModel
    ->where('user_id', $user->id)
    ->update([
      'award' => $data['award'],
      'year' => $data['year'],
      'description' => $data['description'],
      'updated_at' => date("Y-m-d H:i:s")
    ]);

    // return resume page
    $url = '/candidate/'.$username.'/resume';
    return Redirect::to($url);
  }

  // portfolio upload
  public function pof_upload($username, UploadPortfolioRequest $request) {
    $userModel = new User;
    $user = $userModel->where('username', $username)->first();

    $file = $request->file('pofUpload');
    $url = $file->move('assets/images/portfolio/'.$user->id, $file->getClientOriginalName());
    $pofModel = new CandidatePortfolio;
    $pofModel->user_id = $user->id;
    $pofModel->url = $url;
    $pofModel->created_at = date("Y-m-d H:i:s");
    $pofModel->updated_at = date("Y-m-d H:i:s");
    $pofModel->save();

    // return resume page
    $url = '/candidate/'.$username.'/resume';
    return Redirect::to($url);
  }

  // portfolio remove
  public function pof_remove($username, $id) {
    $pofModel = new CandidatePortfolio;
    $pofModel->where('id', $id)->delete();
    
    // return resume page
    $url = '/candidate/'.$username.'/resume';
    return Redirect::to($url);
  }
}
