<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Http\Requests\CreateJobRequest;
use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\User;
use App\Models\AppliedJob;

class JobController extends Controller
{
  public function job_create($username, CreateJobRequest $request) {
    $data = $request->all();
    $jobModel = new Job;
    $empModel = new User;
    $user = $empModel->where('username', $username)->first();
    
    $address = ($data['address'] != '') ? explode(",", $data['address']) : '';
    
    $jobModel->employer_id = $user->id;
    $jobModel->title = $data['title'];
    $jobModel->description = $data['description'];
    $jobModel->deadline = $data['deadline'];
    $jobModel->job_type = $data['job_type'];
    $jobModel->min_salary = $data['min_salary'];
    $jobModel->max_salary = $data['max_salary'];
    $jobModel->experience = $data['experience'];
    $jobModel->gender = $data['gender'];
    $jobModel->country_id = ($address == '') ? '' : $address[0];
    $jobModel->state_id = ($address == '') ? '' : $address[1];
    $jobModel->created_at = date("Y-m-d H:i:s");
    $jobModel->updated_at = date("Y-m-d H:i:s");
    $jobModel->save();

    $url = '/employer/'.$user->username.'/active-jobs';
    return Redirect::to($url);
  }
  public function job_applicants($username, $id, $page=null) {
    $jobModel = new Job;
    $empModel = new User;
    $employer = $empModel->where('username', $username)->first();

    if( is_null($page) ) $current_page = 1;
    else $current_page = $page;
    
    $applicants = DB::table('applied_jobs')
                      ->leftjoin('users', 'applied_jobs.candidate_id', '=', 'users.id')
                      ->leftjoin('candidate_profiles', 'users.id', '=', 'candidate_profiles.user_id')
                      ->leftjoin('countries', 'candidate_profiles.country_id', '=', 'countries.id')
                      ->leftjoin('states', 'candidate_profiles.state_id', '=', 'states.id')
                      ->select(
                        'applied_jobs.salary',
                        'candidate_profiles.*',
                        'countries.name as country_name',
                        'countries.sortname',
                        'states.name as state_name'
                      )
                      ->where('applied_jobs.job_id', $id)
                      ->orderBy('applied_jobs.created_at')
                      ->skip(($current_page-1)*5)
                      ->take(5)
                      ->get();
    $pages = ceil(sizeof($applicants)/5);
    return view('employer/employer-job-applicants', [
      'applicants' => $applicants,
      'user' => $employer,
      'pages' => $pages,
      'current_page' => $current_page,
      'job_id' => $id
    ]);
  }
  public function find_jobs($username) {
    $canModel = new User;
    $candidate = $canModel->where('username', $username)->first();

    $jobModel = new Job;
    $jobs = $jobModel->orderBy('created_at')->get();

    return view('candidate/candidate-find-jobs', [
      'jobs' => $jobs,
      'user' => $candidate
    ]);
  }
  public function show($username, $id) {
    $canModel = new User;
    $candidate = $canModel->where('username', $username)->first();
    $jobModel = new Job;
    $job = $jobModel->where('id', $id)->first();
    $appliedModel = new AppliedJob;
    $apply = $appliedModel->where('job_id', '=', $id)->where('candidate_id', '=', $candidate->id)->first();
    
    $applicants = DB::table('applied_jobs')
                      ->leftjoin('users', 'applied_jobs.candidate_id', '=', 'users.id')
                      ->leftjoin('candidate_profiles', 'users.id', '=', 'candidate_profiles.user_id')
                      ->leftjoin('countries', 'candidate_profiles.country_id', '=', 'countries.id')
                      ->leftjoin('states', 'candidate_profiles.state_id', '=', 'states.id')
                      ->select(
                        'applied_jobs.*', 
                        'candidate_profiles.*', 
                        'countries.sortname', 
                        'countries.name as country_name', 
                        'states.name as state_name'
                      )
                      ->where('applied_jobs.job_id', '=', $id)
                      ->where('applied_jobs.awarded', '=', 0)
                      ->orderBy('applied_jobs.created_at')
                      ->get();

    return view('candidate/candidate-apply-job', [
      'job' => $job,
      'user' => $candidate,
      'apply' => $apply,
      'applicants' => $applicants
    ]);
  }
  public function apply($username, $id, Request $request) {
    $data = $request->all();
    $canModel = new User;
    $applyModel = new AppliedJob;
    $candidate = $canModel->where('username', $username)->first();
    $applyModel->candidate_id = $candidate->id;
    $applyModel->job_id = $id;
    $applyModel->timeline = $data['timeline'];
    $applyModel->salary = $data['salary'];
    $applyModel->created_at = date("Y-m-d H:i:s");
    $applyModel->updated_at = date("Y-m-d H:i:s");
    $applyModel->save();

    $url = '/candidate/'.$username.'/job/show/'.$id;
    return Redirect::to($url);
  }
  public function award($username, $id, $candidate_id) {
    $applyModel = new AppliedJob;
    $applyModel->where('job_id', $id)
                ->where('candidate_id', $candidate_id)
                ->update([
                  'awarded' => 1,
                  'awarded_at' => date("Y-m-d H:i:s")
                ]);
    $url = '/employer/'.$username.'/current-jobs';
    return Redirect::to($url);
  }
  public function complete($username, $id) {
    $jobModel = new Job;
    $jobModel->where('id', $id)->update([
      'completed' => 1,
      'completed_at' => date("Y-m-d H:i:s")
    ]);

    $url = '/employer/'.$username.'/past-jobs';
    return Redirect::to($url);
  }
}
