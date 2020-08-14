<?php

namespace App;
use Auth;
use DB;
use Illuminate\Database\Eloquent\Model;

class Stash extends Model
{
    protected $table = 'stashes';
    public $timestamps = false;
    
    protected $fillable = [
        'thread_id', 'user_id', 'skein', 'bobbin', 'partial', 'need'
    ];

    // public static function dmcsearch($query)
    // {
    //     return DB::table('stashes')
    //         ->join('threads', 'stashes.thread_id', '=', 'threads.id')
    //         ->where('stashes.user_id', Auth::user()->id)
    //         ->where('threads.brand', 'DMC')
    //         ->where('threads.number', 'like', '%' . $query . '%')
    //         ->select('stashes.*', 'threads.*')
    //         ->get()->toArray();
    // }


}
