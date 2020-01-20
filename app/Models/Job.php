<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
  public function employer() {
    return $this->belongsTo('App\Models\User');
  }
  public function country() {
    return $this->belongsTo('App\Models\Country');
  }
  public function state() {
    return $this->belongsTo('App\Models\State');
  }
  public function applicants() {
    return $this->belongsToMany('App\Models\User', 'applied_jobs')->withPivot('timeline', 'salary', 'created_at', 'updated_at', 'awarded', 'awarded_at', 'accept', 'accept_at');
  }
}
