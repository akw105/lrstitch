<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;

use Carbon\Carbon;
class User extends Authenticatable
{
    use Notifiable;
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'thread_stash', 'stripe_id', 'card_brand', 'card_last_four', 'trial_ends_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function stash()
    {
        return $this->hasMany('App\Thread');
    }

    public function initials(){
        $initial = substr($this->name, 0, 1);
        return strtoupper($initial);
     }

     public function subscription()
    {
        return $this->hasMany('App\Plan');
    }

    public function getTrialEndsAtAttribute($value)
    {
        $format = $this->getDateFormat();   
        return  Carbon::createFromFormat($format, $value, 'UTC')->setTimezone(\Helper::getTimezone());
    }  
}
