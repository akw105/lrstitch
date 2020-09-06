<?php

namespace App\Imports;

use App\Stash;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Thread;
use Illuminate\Support\Facades\DB;
use Auth;
class StashImport implements ToCollection
{
    // /**
    // * @param array $row
    // *
    // * @return \Illuminate\Database\Eloquent\Model|null
    // */
    // public function model(array $row)
    // {
    //     return new Stash([
    //         'thread_id'     => $row[0],
    //         'user_id'    => Auth::user()->id,
    //         'skein'    => $row[2],
    //         'bobbin'    => $row[3],
    //         'partial'    => $row[4],
    //         'need' => $row[5]
    //     ]);
    // }

    
    public function collection(Collection $rows)
    {

        unset($rows[0]); 
        foreach ($rows as $row) {
            $number = $row[0];
            $brand = $row[1];
            if($row[2] == null){ $skein = 0; }else{$skein = $row[2];};
            if($row[3] == null){ $bobbin = 0; }else{$bobbin = $row[3];};
            if($row[4] == null){ $partial = 0; }else{$partial = $row[4];};
            if($row[5] == null){ $need = 0; }else{$need = $row[5];};
            $thread = Thread::where('number', '=', $number)->first();
            DB::table('stashes')->insert([
                'thread_id'     => $thread->id,
                'user_id'    => Auth::user()->id,
                'skein'    => $skein,
                'bobbin'    => $bobbin,
                'partial'    => $partial,
                'need' => $need,
                ]
            );
            // new Stash([
            //     'thread_id'     => $thread->id,
            //     'user_id'    => Auth::user()->id,
            //     'skein'    => $skein,
            //     'bobbin'    => $bobbin,
            //     'partial'    => $partial,
            //     'need' => $need
            // ]);
        }
        dd('done');
    }


}
