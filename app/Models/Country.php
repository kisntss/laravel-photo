<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
  public function states() {
    return $this->hasMany('App\Models\State');
  }
  public function candidates() {
    return $this->hasMany('App\Models\CandidateProfile');
  }
  public function employers() {
    return $this->hasMany('App\Models\EmployerProfile');
  }
  public function jobs() {
    return $this->hasMany('App\Models\Job');
  }
}
