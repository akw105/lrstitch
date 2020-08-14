<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;

// Posts class instance will refer to posts table in database
class Post extends Model
{
  //restricts columns from modifying
  protected $guarded = [];

}
