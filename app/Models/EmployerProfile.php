<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployerProfile extends Model
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
}
