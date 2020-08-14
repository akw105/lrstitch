<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\User;
use App\Fabric;
use App\Stash;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getProfile($name)
    {
        if(Auth::user()->name == $name) {
            $user = Auth::user();
            return view('profile.index', ['user' => $user]);
       } else {
        return redirect('/');
       } 
        
    }

    public function editProfile($name)
    {
        if(Auth::user()->name == $name) {
            $user = Auth::user();
            return view('profile.settings', ['user' => $user]);
       } else {
        return redirect('/');
       } 
        
    }

    public function confirm($name)
    {
        if(Auth::user()->name == $name) {
            $user = Auth::user();
            return view('profile.delete', ['user' => $user]);
       } else {
        return redirect('/action-denied');
       } 
        
    }

    public function destroy($id)
{
    if(Auth::user()->id == $id) {
        $user = Auth::user()->where('id', $id);
        
        $threads = Stash::where('user_id', Auth::user()->id)->delete();
        $fabrics = Fabric::where('user_id', Auth::user()->id)->delete();
        $user = User::where('id', Auth::user()->id)->delete();
        return redirect('/');
    }
    else{
        return redirect('/action-denied');
    }
}
}
