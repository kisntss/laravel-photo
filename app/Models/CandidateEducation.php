<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CandidateEducation extends Model
{
  public function candidate() {
    return $this->belongsTo('App\Models\User');
  }
}
