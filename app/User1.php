<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function awards() {
        return $this->hasMany('App\Models\UserAward');
    }

    public function educations() {
        return $this->hasMany('App\Models\UserEducation');
    }

    public function experiences() {
        return $this->hasMany('App\Models\UserExperience');
    }

    public function finances() {
        return $this->hasMany('App\Models\UserFinance');
    }

    public function friends() {
        return $this->hasMany('App\Models\UserFriend');
    }

    public function user_portfolios() {
        return $this->hasMany('App\Models\Portfolio');
    }

    public function skills() {
        return $this->belongsToMany('App\Models\Skill', 'user_skills', 'user_id', 'skill_id');
    }

    public function reset_passwords() {
        return $this->hasMany('App\Models\ResetPassword');
    }

    public function jobs() {
        return $this->hasMany('App\Models\Job');
    }

    public function profile() {
        return $this->hasOne('App\Models\UserProfile');
    }

    public function memberships() {
        return $this->belongsToMany('App\Models\Membership', 'user_memberships', 'user_id', 'membership_id');
    }

}
