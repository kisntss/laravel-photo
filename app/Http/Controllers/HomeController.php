<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
  public function home() {
    return view('home'); 
  }
  public function sign() {
    return view('sign');
  }
  public function search_jobs() {
    return view('jobs');
  }
  public function browse_employers() {
    return view('employer/employers');
  }
  public function browse_candidates() {
    return view('candidate/candidates');
  }
  public function candidate_detail() {
    return view('candidate/candidate-single');
  }
}
