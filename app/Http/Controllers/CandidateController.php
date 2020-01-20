<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Country;
use App\Models\AppliedJob;
use App\Models\Message;
use App\Models\MessageContact;

class CandidateController extends Controller
{
  /**
   * Candidate Controller
   * dashboard, profile, resume, applied jobs, completed jobs, 
   * messages, reviews, recent jobs, change password, logout
   */

  // Render the candidate dashboard page
  public function dashboard($username) {
    $candidateModel = new User;
    $candidate = 
      $candidateModel->where('username', $username)->first();
    return view('candidate/candidate-dashboard', [
      'user' => $candidate
    ]);
  }

  // Render the candidate profile page
  public function profile($username) {
    $countryModel = new Country;
    $candidateModel = new User;
    $countries = 
      $countryModel->with('states')->get();
    $candidate = 
      $candidateModel->where('username', $username)->first();
    
    return view('candidate/candidate-profile', [
      'countries' => $countries,
      'user'      => $candidate
    ]);
  }

  // Render the candidate resume page
  public function resume($username) {
    $candidateModel = new User;
    $candidate = 
      $candidateModel->where('username', $username)->first();
    return view('candidate/candidate-resume', [
      'user'      => $candidate
    ]);
  }

  // Render the applied jobs page
  public function applied_jobs($username, $page=null) {
    if( is_null($page) ) $current_page = 1;
    else $current_page = $page;
    $candidateModel = new User;
    $candidate = 
      $candidateModel->where('username', $username)->first();
    $appliedModel = new AppliedJob;
    $applied_jobs = 
      $appliedModel->where('candidate_id', $candidate->id)
                  ->where('awarded', 0)
                  ->get();
    $jobs = DB::table('applied_jobs')
                ->leftjoin('jobs', 'applied_jobs.job_id', '=', 'jobs.id')
                ->leftjoin('users', 'jobs.employer_id', '=', 'users.id')
                ->leftjoin('employer_profiles', 'users.id', '=', 'employer_profiles.user_id')
                ->leftjoin('countries', 'employer_profiles.country_id', '=', 'countries.id')
                ->select('jobs.*', 'employer_profiles.fullname', 'employer_profiles.avatar', 'countries.*')
                ->where('applied_jobs.candidate_id', $candidate->id)
                ->where('applied_jobs.awarded', 0)
                ->orderBy('applied_jobs.created_at', 'ASC')
                ->skip(($current_page-1)*5)
                ->take(5)
                ->get();
    $pages = ceil(sizeof($applied_jobs) / 5);

    return view('candidate/candidate-applied-jobs', [
      'user'      => $candidate,
      'jobs'      => $jobs,
      'pages'     => $pages,
      'current_page' => $current_page
    ]);
  }

  // Render the completed jobs page
  public function completed_jobs($username, $page=null) {
    if( is_null($page) ) $current_page = 1;
    else $current_page = $page;
    $candidateModel = new User;
    $candidate = 
      $candidateModel->where('username', $username)->first();
    $appliedModel = new AppliedJob;
    $completed_jobs = DB::table('applied_jobs')
                        ->leftjoin('jobs', 'applied_jobs.job_id', '=', 'jobs.id')
                        ->select('jobs.*')
                        ->where('applied_jobs.candidate_id', $candidate->id)
                        ->where('jobs.completed', 1)
                        ->get();
    $jobs = DB::table('applied_jobs')
                ->leftjoin('jobs', 'applied_jobs.job_id', '=', 'jobs.id')
                ->leftjoin('users', 'jobs.employer_id', '=', 'users.id')
                ->leftjoin('employer_profiles', 'users.id', '=', 'employer_profiles.user_id')
                ->leftjoin('countries', 'employer_profiles.country_id', '=', 'countries.id')
                ->select('jobs.*', 'employer_profiles.fullname', 'employer_profiles.avatar', 'countries.*')
                ->where('applied_jobs.candidate_id', $candidate->id)
                ->where('jobs.completed', 1)
                ->orderBy('jobs.completed_at', 'ASC')
                ->skip(($current_page-1)*5)
                ->take(5)
                ->get();
    $pages = ceil(sizeof($completed_jobs) / 5);

    return view('candidate/candidate-completed-jobs', [
      'user'      => $candidate,
      'jobs'      => $jobs,
      'pages'     => $pages,
      'current_page' => $current_page
    ]);
  }

  // Render the messages page
  public function messages($username) {
    $candidateModel = new User;
    $candidate = 
      $candidateModel->where('username', $username)->where('role', 4)->first();
    $query = "SELECT 
                mct.*,
                cpf.*,
                COUNT(is_read) as pending
              FROM message_contacts AS mct 
                LEFT JOIN messages AS msg ON mct.friend_id = msg.from AND msg.is_read = 0 AND msg.to = " . $candidate->id . "
                LEFT JOIN employer_profiles AS cpf ON mct.friend_id = cpf.user_id
              WHERE mct.friend_id != " . $candidate->id . "
              GROUP BY mct.friend_id";
    $contacts = DB::select($query);

    return view('candidate/candidate-messages', [
      'user' => $candidate,
      'contacts' => $contacts,
      'messages' => []
    ]);
  }

  // Render the reviews page
  public function reviews($username) {
    $candidateModel = new User;
    $candidate = 
      $candidateModel->where('username', $username)->first();
    return view('candidate/candidate-reviews', [
      'user'      => $candidate
    ]);
  }

  // Render the recent jobs page
  public function recent_jobs($username, $page=null) {
    if( is_null($page) ) $current_page = 1;
    else $current_page = $page;
    $candidateModel = new User;
    $candidate = 
      $candidateModel->where('username', $username)->first();
    $appliedModel = new AppliedJob;
    $completed_jobs = DB::table('applied_jobs')
                        ->leftjoin('jobs', 'applied_jobs.job_id', '=', 'jobs.id')
                        ->select('jobs.*')
                        ->where('applied_jobs.candidate_id', $candidate->id)
                        ->where('applied_jobs.awarded', 1)
                        ->where('jobs.completed', 0)
                        ->get();
    $jobs = DB::table('applied_jobs')
                ->leftjoin('jobs', 'applied_jobs.job_id', '=', 'jobs.id')
                ->leftjoin('users', 'jobs.employer_id', '=', 'users.id')
                ->leftjoin('employer_profiles', 'users.id', '=', 'employer_profiles.user_id')
                ->leftjoin('countries', 'employer_profiles.country_id', '=', 'countries.id')
                ->select('jobs.*', 'employer_profiles.fullname', 'employer_profiles.avatar', 'countries.*')
                ->where('applied_jobs.candidate_id', $candidate->id)
                ->where('applied_jobs.awarded', 1)
                ->where('jobs.completed', 1)
                ->orderBy('applied_jobs.awarded_at', 'ASC')
                ->skip(($current_page-1)*5)
                ->take(5)
                ->get();
    $pages = ceil(sizeof($completed_jobs) / 5);

    return view('candidate/candidate-recent-jobs', [
      'user'      => $candidate,
      'jobs'      => $jobs,
      'pages'     => $pages,
      'current_page' => $current_page
    ]);
  }

  // Render the change password page
  public function change_password($username) {
    $candidateModel = new User;
    $candidate = 
      $candidateModel->where('username', $username)->first();
    return view('candidate/candidate-change-password', [
      'user'      => $candidate
    ]);
  }

  // logout
  public function logout($username) {
    Session::clear();
    return Redirect::to('/');
  }

  // delete profile
  public function delete_profile($username) {
    
  }
}
