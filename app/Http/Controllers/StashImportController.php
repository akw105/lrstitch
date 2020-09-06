<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\StashImport;
use Maatwebsite\Excel\Facades\Excel;
class StashImportController extends Controller 
{


public function importprocess(Request $request) 
    {
        Excel::import(new StashImport, Request()->file('uploadfile'));
        
        // return redirect('/admin/import-threads')->with('success', 'Import All Good!');
    }

}