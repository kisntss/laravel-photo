<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
	public function employer_profile() {
		return $this->hasOne('App\Models\EmployerProfile');
	}
	public function emp_jobs() {
		return $this->hasMany('App\Models\Job');
	}
}
