<?php

namespace App\Http\Controllers;
use App\Plan;
use Illuminate\Http\Request;
use Auth;
use DB;
class PlanController extends Controller
{
    public function index()
    {
            $plans = Plan::all();
            return view('site.subscribe', compact('plans'));
    }

    public function show(Plan $plan, Request $request)
    {
        $user = Auth::user();
        $intent = $user->createSetupIntent();
        return view('site.plan', compact(['plan', 'intent']));
    }

    public function change()
    {
        $user = Auth::user();

        $subscriptionplan = DB::table('subscription_plans')
            ->select('subscription_plans.name')
            ->join('subscriptions', 'subscriptions.stripe_plan', '=', 'subscription_plans.stripe_id')
            ->where('subscriptions.user_id', $user->id)
            ->first();
            $plans = Plan::where('name', '!=', $subscriptionplan->name)->get();
        return view('site.subscribechange', compact(['plans']));
    }
}
