<?php

namespace App\Http\Controllers;
use App\Imports\ThreadsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;

class ThreadImportController extends Controller 
{

    public function importpage(){
        return view('admin.import');
    }

public function importprocess(Request $request) 
    {
        Excel::import(new ThreadsImport, Request()->file('uploadfile'));
        
        return redirect('/admin/import-threads')->with('success', 'Import All Good!');
    }

}