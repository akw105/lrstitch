<?php

namespace App\Exports;

use App\Stash;
use Auth;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class ThreadExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $user_id =  Auth::user()->id;
        $stash = DB::table('stashes')
            ->select('*')
            ->join('threads', 'threads.id', '=', 'stashes.thread_id')
            ->where('stashes.user_id', $user_id)
            ->orderBy('threads.id')
            ->get();

        return $stash;
    }
}
