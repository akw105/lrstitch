<?php

namespace App\Http\Controllers;
use Auth;
use App\User;
use App\Stash;
use App\Fabric;
use DB;
use Illuminate\Http\Request;

class FabricController extends Controller
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
        
            if(Fabric::where('user_id', '=', $user_id)->count() == 0){
                // there are no fabrics saved
                return view('threads.nofabrics', ['user' => $user]);

            }
            else{
                $stash = Fabric::where('user_id', $user_id)->get();
                return view('threads.fabrics', ['user' => $user, 'stash' => $stash]);

            }
            
        }
        
    }

    public function add(Request $request)
    {
        $fabric = new Fabric;
        $fabric->user_id = $request->user_id;
        $fabric->type = $request->type;
        $fabric->brand = $request->brand;
        $fabric->count = $request->count;
        $fabric->colour = $request->colour;
        $fabric->height_measure = $request->height_measure;
        $fabric->height = $request->height;
        $fabric->width_measure = $request->width_measure;
        $fabric->width = $request->width;
        $fabric->notes = $request->notes;
        $fabric->status = $request->status;

        $fabric->save();
        if(!$fabric){
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
