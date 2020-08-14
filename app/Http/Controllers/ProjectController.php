<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Stash;
use App\Fabric;
use App\Project;
use App\File;
use DB;
use Storage;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        
            if($stash = DB::table('userprojects')->where('userid', $user_id)->count() == 0){
                // there are no fabrics saved
                return view('projects.noprojects', ['user' => $user]);

            }
            else{
                $stash = DB::table('userprojects')
                ->select('*')
                ->join('projects', 'projects.id', '=', 'userprojects.projectid')
                ->where('userprojects.userid', $user_id)
                ->where('userprojects.status', '!=', 'wishlist')
                ->get();
                return view('projects.index', ['user' => $user, 'stash' => $stash]);

            }
            
        }
        
    }

    public function wishlist($username)
    {
        $user_id = Auth::user()->where('name', $username)->value('id');

        if(Auth::user()->id != $user_id){
            // if current logged in user is not he user of the profile
            $user = User::find($user_id);
            return view('threads.noaccess', ['user' => $user]);
        }
        else{
            $user = User::find($user_id);
        
            if($stash = DB::table('userprojects')->where('userid', $user_id)->count() == 0){
                // there are no fabrics saved
                return view('projects.noprojects', ['user' => $user]);

            }
            else{
                $stash = DB::table('userprojects')
                ->select('*')
                ->join('projects', 'projects.id', '=', 'userprojects.projectid')
                ->where('userprojects.userid', $user_id)
                ->where('userprojects.status', '=', 'wishlist')
                ->get();
                return view('projects.wishlist', ['user' => $user, 'stash' => $stash]);

            }
            
        }
        
    }

    public function getAutocompleteData(Request $request){
        
        if($request->has('name')){
            $suggest = Project::where('title','like','%'.$request->input('name').'%')->get();

            if(count($suggest) != 0){
                return 'none';
            }
            else{
                return Project::where('title','like','%'.$request->input('name').'%')->get();
            }
        }
    }

 
    public function add(Request $request)
    {

        $request->validate([
            'file' => 'required|mimes:png,jpg,jpeg,svg|max:2048'
        ]);
    
        $fileModel = new File;
    
        if($request->file()) {
                $fileName = time().'_'.$request->file->getClientOriginalName();
                //$filePath = $request->file('file')->storeAs('uploads/projects', $fileName, 'public');
                $filePath = Storage::disk('publicprojects')->put($fileName,$request->file('file'));
    
                $fileModel->name = time().'_'.$request->file->getClientOriginalName();
                $fileModel->file_path = $filePath;
                $fileModel->save();
        }

        $project = new Project;
        $project->title = $request->name;
        $project->artist = $request->artist;
        $project->source = $request->source;
        $project->image = $filePath;
        $project->save();

        $projectid = $project->id;
        // get project id
        // now create the user - project relationship
        $userproject = DB::table('userprojects')->insert(['userid' => $request->user_id, 'projectid' => $projectid, 'status' => $request->status, 'datestart' => $request->startdate, 'dateend' => $request->enddate]);

        if(!$userproject){
            dd('unable to save!');
            return false;
        }
        else {
            return redirect()->back();
        }
        // return $request;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stash  $stash
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request);
        $updated = DB::table('fabrics')
        ->where('id', $request['fabric_id'])  // find your user by their email
        ->limit(1)  // optional - to ensure only one record is updated.
        ->update(array('brand' => $request['brand'], 'type' => $request['type'], 'count' => $request['count'], 'colour' => $request['colour'], 'height' => $request['height'], 'width' => $request['width'], 'notes' => $request['notes'], 'status' => $request['status']));  // update the record in the DB. 
        if($updated) {
            return redirect()->back();
        }
        else {
            dd('unable to save!');
            return false;
        }
        // return $request;
    }

    public function delete($id)
    {
        Fabric::destroy($id);
        return redirect()->back();
    }


}
