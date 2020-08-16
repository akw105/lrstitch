<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $table = 'subscription_plans';

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
