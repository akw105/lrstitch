<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Stash;
use App\Thread;
use DB;
use Illuminate\Http\Request;

class StashController extends Controller
{

    public function index($username)
    {
        $user_id = Auth::user()->where('name', $username)->value('id');

        if(Auth::user()->id != $user_id){
            // if current logged in user is not he user of the profile
            $user = User::find($user_id);
            return view('threads.noaccess', ['user' => $user]);
        }
        else{
            $user = User::find($user_id);
        
            if(Stash::where('user_id', '=', $user_id)->count() == 0){
                // need to make an alert whilst initial stash is created
                $threads = Thread::all();
    
                foreach($threads as $thread){
                    $values = array('thread_id' => $thread->id, 'user_id' => $user_id, 'skein' => 0, 'bobbin' => 0, 'partial' => 0, 'need' => 0);
                    DB::table('stashes')->insert($values);
                }
            }
            return view('threads.index', ['user' => $user]);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexdmc($username)
    {
        $user_id = Auth::user()->where('name', $username)->value('id');

        if(Auth::user()->id != $user_id){
            // if current logged in user is not he user of the profile
            $user = User::find($user_id);
            return view('threads.noaccess', ['user' => $user]);
        }
        else{
            $user = User::find($user_id);
        
            $stash = DB::table('stashes')
            ->select('*')
            ->join('threads', 'threads.id', '=', 'stashes.thread_id')
            ->where('stashes.user_id', $user_id)
            ->where('threads.brand', '=', 'DMC')
            ->orderBy('threads.id')
            ->get();
            return view('threads.threads-table', ['user' => $user, 'stash' => $stash]);
        }
        
    }

    public function indexanchor($username)
    {
        $user_id = Auth::user()->where('name', $username)->value('id');

        if(Auth::user()->id != $user_id){
            // if current logged in user is not he user of the profile
            $user = User::find($user_id);
            return view('threads.noaccess', ['user' => $user]);
        }
        else{
            $user = User::find($user_id);
        
            $stash = DB::table('stashes')
            ->select('*')
            ->join('threads', 'threads.id', '=', 'stashes.thread_id')
            ->where('stashes.user_id', $user_id)
            ->where('threads.brand', '=', 'Anchor')
            ->orderBy('threads.id')
            ->get();
            return view('threads.threads-table', ['user' => $user, 'stash' => $stash]);
        }
        
    }

    public function indexcxc($username)
    {
        $user_id = Auth::user()->where('name', $username)->value('id');

        if(Auth::user()->id != $user_id){
            // if current logged in user is not he user of the profile
            $user = User::find($user_id);
            return view('threads.noaccess', ['user' => $user]);
        }
        else{
            $user = User::find($user_id);
        
            $stash = DB::table('stashes')
            ->select('*')
            ->join('threads', 'threads.id', '=', 'stashes.thread_id')
            ->where('stashes.user_id', $user_id)
            ->where('threads.brand', '=', 'CXC')
            ->orderBy('threads.id')
            ->get();
            return view('threads.threads-table', ['user' => $user, 'stash' => $stash]);
        }
        
    }

    public function indexsullivans($username)
    {
        $user_id = Auth::user()->where('name', $username)->value('id');

        if(Auth::user()->id != $user_id){
            // if current logged in user is not he user of the profile
            $user = User::find($user_id);
            return view('threads.noaccess', ['user' => $user]);
        }
        else{
            $user = User::find($user_id);
        
            $stash = DB::table('stashes')
            ->select('*')
            ->join('threads', 'threads.id', '=', 'stashes.thread_id')
            ->where('stashes.user_id', $user_id)
            ->where('threads.brand', '=', 'Sullivans')
            ->orderBy('threads.id')
            ->get();
            return view('threads.threads-table', ['user' => $user, 'stash' => $stash]);
        }
        
    }

    public function indexbatch($username)
    {
        $user_id = Auth::user()->where('name', $username)->value('id');

        if(Auth::user()->id != $user_id){
            // if current logged in user is not he user of the profile
            $user = User::find($user_id);
            return view('threads.noaccess', ['user' => $user]);
        }
        else{
            $user = User::find($user_id);
        
            $stash = DB::table('stashes')
            ->select('*')
            ->join('threads', 'threads.id', '=', 'stashes.thread_id')
            ->where('stashes.user_id', $user_id)
            ->orderBy('threads.id')
            ->get();
            $half = count($stash) / 2;
            $chunks = $stash->chunk(2);
            return view('threads.batch', ['user' => $user, 'stash' => $stash, 'half'=>$half]);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stash  $stash
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stash $stash)
    {
        $updated = DB::table('stashes')
        ->where('stash_id', $request['id'])  // find your user by their email
        ->limit(1)  // optional - to ensure only one record is updated.
        ->update(array('skein' => $request['skein'], 'bobbin' => $request['bobbin'], 'partial' => $request['partial'], 'need' => $request['need']));  // update the record in the DB. 
        if($updated) {
            return true;
            
        }
        else {
            return false;
        }
        // return $request;
    }

    public function bulkupdate(Request $request, Stash $stash)
    {
        // dd($request);
        foreach($request->all() as $key){
            $stashid = $key[0];
            dump($stashid);
        }
        $updated = DB::table('stashes')
        ->where('stash_id', $request['id'])  // find your user by their email
        ->limit(1)  // optional - to ensure only one record is updated.
        ->update(array('skein' => $request['skein'], 'bobbin' => $request['bobbin'], 'partial' => $request['partial'], 'need' => $request['need']));  // update the record in the DB. 
        if($updated) {
            return true;
        }
        else {
            return false;
        }
        // return $request;
    }

    public function shopping_list($username){

        $user_id = Auth::user()->where('name', $username)->value('id');

        if(Auth::user()->id != $user_id){
            // if current logged in user is not he user of the profile
            $user = User::find($user_id);
            return view('threads.noaccess', ['user' => $user]);
        }
        else{
            $user = User::find($user_id);

            $list = DB::table('stashes')
            ->select('*')
            ->join('threads', 'threads.id', '=', 'stashes.thread_id')
            ->where('stashes.user_id', $user_id)
            ->where('stashes.need','!=', '0')
            ->get();
            return view('threads.shopping', ['user' => $user, 'list' => $list]);
        }
    }

}
