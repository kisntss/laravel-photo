<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
  public function cities() {
    return $this->hasMany('App\Models\City');
  }
  public function country() {
    return $this->belongsTo('App\Models\Country');
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
