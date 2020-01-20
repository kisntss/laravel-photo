<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  public function candidate_profile() {
    return $this->hasOne('App\Models\CandidateProfile');
  }
  public function candidate_educations() {
    return $this->hasMany('App\Models\CandidateEducation');
  }
  public function candidate_experiences() {
    return $this->hasMany('App\Models\CandidateExperience');
  }
  public function candidate_portfolios() {
    return $this->hasMany('App\Models\CandidatePortfolio');
  }
  public function candidate_skills() {
    return $this->belongsToMany('App\Models\Skill', 'candidate_skills', 'candidate_id', 'skill_id');
  }
  public function candidate_awards() {
    return $this->hasMany('App\Models\CandidateAward');
  }
  public function jobs() {
    return $this->belongsToMany('App\Models\Job')->withPivot('timeline', 'salary', 'created_at', 'updated_at', 'awarded', 'awarded_at', 'accept', 'accept_at');
  }
  public function employer_profile() {
		return $this->hasOne('App\Models\EmployerProfile');
	}
	public function emp_jobs() {
		return $this->hasMany('App\Models\Job');
	}
}
