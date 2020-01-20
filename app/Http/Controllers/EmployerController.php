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

class EmployerController extends Controller
{
  public function dashboard($username) {
    $empModel = new User;
    $employer = 
      $empModel->where('username', $username)->first();

    return view('employer/employer-dashboard', [
      'user' => $employer
    ]);
  }
  public function profile($username) {
    $empModel = new User;
    $countryModel = new Country;
    $countries = 
      $countryModel->with('states')->get();
    $employer = 
      $empModel->where('username', $username)->first();

    return view('employer/employer-profile', [
      'countries' => $countries,
      'user' => $employer
    ]);
  }
  public function post_job($username) {
    $empModel = new User;
    $countryModel = new Country;
    $employer = 
      $empModel->where('username', $username)->first();
    $countries = 
      $countryModel->with('states')->get();

    return view('employer/employer-post-job', [
      'countries' => $countries,
      'user' => $employer
    ]);
  }
  public function active_jobs($username, $page=null) {
    if( is_null($page) )
      $current_page = 1;
    else
      $current_page = $page;
    $empModel = new User;
    $employer = 
      $empModel->where('username', $username)->first();
    $pages = DB::table('jobs')
                  ->leftjoin('applied_jobs', 'jobs.id', '=', 'applied_jobs.job_id')
                  ->select('jobs.*', 'applied_jobs.awarded')
                  ->where('jobs.employer_id', $employer->id)
                  ->where('applied_jobs.awarded', 0)
                  ->where('jobs.deadline', '>', date("Y-m-d"))
                  ->groupBy('jobs.id')
                  ->count();
    $active_jobs = DB::table('jobs')
                      ->leftjoin('applied_jobs', 'jobs.id', '=', 'applied_jobs.job_id')
                      ->select('jobs.*', 'applied_jobs.awarded', DB::raw('COUNT(*) as count, SUM(applied_jobs.salary) as sum_salary'))
                      ->where('jobs.employer_id', $employer->id)
                      ->where('applied_jobs.awarded', 0)
                      ->where('jobs.deadline', '>', date("Y-m-d"))
                      ->groupBy('jobs.id')
                      ->orderBy('jobs.created_at')
                      ->skip(($current_page-1)*5)
                      ->take(5)
                      ->get();

    return view('employer/employer-active-jobs', [
      'user' => $employer,
      'pages' => ceil($pages/5),
      'jobs' => $active_jobs,
      'current_page' => $current_page
    ]);
  }
  public function current_jobs($username, $page=null) {
    if( is_null($page) )
      $current_page = 1;
    else
      $current_page = $page;
    $empModel = new User;
    $employer = 
      $empModel->where('username', $username)->first();
    $pages = DB::table('jobs')
                  ->leftjoin('applied_jobs', 'jobs.id', '=', 'applied_jobs.job_id')
                  ->select('jobs.*', 'applied_jobs.awarded')
                  ->where('jobs.employer_id', $employer->id)
                  ->where('applied_jobs.awarded', 1)
                  ->where('jobs.completed', 0)
                  ->count();
    $current_jobs = DB::table('jobs')
                      ->leftjoin('applied_jobs', 'jobs.id', '=', 'applied_jobs.job_id')
                      ->leftjoin('users', 'applied_jobs.candidate_id', '=', 'users.id')
                      ->leftjoin('candidate_profiles', 'users.id', '=', 'candidate_profiles.user_id')
                      ->leftjoin('countries', 'candidate_profiles.country_id', '=', 'countries.id')
                      ->select(
                        'jobs.*', 
                        'applied_jobs.*', 
                        'users.*', 
                        'candidate_profiles.fullname', 
                        'candidate_profiles.avatar',
                        'countries.name as country_name', 
                        'countries.sortname'
                      )
                      ->where('jobs.employer_id', $employer->id)
                      ->where('applied_jobs.awarded', 1)
                      ->where('jobs.completed', 0)
                      ->orderBy('applied_jobs.awarded_at')
                      ->skip(($current_page-1)*5)
                      ->take(5)
                      ->get();
    
    return view('employer/employer-current-jobs', [
      'user' => $employer,
      'pages' => ceil($pages/5),
      'jobs' => $current_jobs,
      'current_page' => $current_page
    ]);
  }
  public function past_jobs($username, $page=null) {
    if( is_null($page) )
      $current_page = 1;
    else
      $current_page = $page;
    $empModel = new User;
    $employer = 
      $empModel->where('username', $username)->first();
    $pages = DB::table('jobs')
                  ->leftjoin('applied_jobs', 'jobs.id', '=', 'applied_jobs.job_id')
                  ->select('jobs.*', 'applied_jobs.awarded')
                  ->where('jobs.employer_id', $employer->id)
                  ->where('applied_jobs.awarded', 1)
                  ->where('jobs.completed', 0)
                  ->count();
    $past_jobs = DB::table('jobs')
                      ->leftjoin('applied_jobs', 'jobs.id', '=', 'applied_jobs.job_id')
                      ->leftjoin('users', 'applied_jobs.candidate_id', '=', 'users.id')
                      ->leftjoin('candidate_profiles', 'users.id', '=', 'candidate_profiles.user_id')
                      ->leftjoin('countries', 'candidate_profiles.country_id', '=', 'countries.id')
                      ->select(
                        'jobs.*', 
                        'applied_jobs.*', 
                        'users.*', 
                        'candidate_profiles.fullname', 
                        'candidate_profiles.avatar',
                        'countries.name as country_name', 
                        'countries.sortname'
                      )
                      ->where('jobs.employer_id', $employer->id)
                      ->where('applied_jobs.awarded', 1)
                      ->where('jobs.completed', 1)
                      ->orderBy('jobs.completed_at')
                      ->skip(($current_page-1)*5)
                      ->take(5)
                      ->get();
    
    return view('employer/employer-past-jobs', [
      'user' => $employer,
      'pages' => ceil($pages/5),
      'jobs' => $past_jobs,
      'current_page' => $current_page
    ]);
  }
  public function packages($username) {
    $empModel = new User;
    $employer = 
      $empModel->where('username', $username)->first();
      
    return view('employer/employer-packages', [
      'user' => $employer
    ]);
  }
  public function transactions($username) {
    $empModel = new User;
    $employer = 
      $empModel->where('username', $username)->first();

    return view('employer/employer-transactions', [
      'user' => $employer
    ]);
  }
  public function messages($username) {
    $empModel = new User;
    $employer = $empModel->where('username', $username)->where('role', 3)->first();

    $query = "SELECT 
                mct.*,
                cpf.*,
                COUNT(is_read) as pending
              FROM message_contacts AS mct 
                LEFT JOIN messages AS msg ON mct.friend_id = msg.from AND msg.is_read = 0 AND msg.to = " . $employer->id . "
                LEFT JOIN candidate_profiles AS cpf ON mct.friend_id = cpf.user_id
              WHERE mct.friend_id != " . $employer->id . "
              GROUP BY mct.friend_id";
    $contacts = DB::select($query);
    
    return view('employer/employer-messages', [
      'user' => $employer,
      'contacts' => $contacts,
      'messages' => []
    ]);
  }
  public function change_password($username) {
    $empModel = new User;
    $employer = 
      $empModel->where('username', $username)->first();

    return view('employer/employer-change-password', [
      'user' => $employer
    ]);
  }
  public function logout($username) {
    Session::clear();
    return Redirect::to('/');
  }
  public function delete_profile($username) {

  }
}
