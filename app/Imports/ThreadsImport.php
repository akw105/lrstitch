<?php

namespace App\Imports;

use App\Thread;
use Maatwebsite\Excel\Concerns\ToModel;

class ThreadsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Thread([
            'number'     => $row[0],
            'name'    => $row[1],
            'brand'    => $row[2],
            'category'    => $row[3],
            'hex'    => $row[4],
        ]);
    }
}
