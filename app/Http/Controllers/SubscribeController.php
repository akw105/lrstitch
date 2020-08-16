<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use Auth;
class SubscribeController extends Controller
{
    public function create(Request $request, Plan $plan)
    {
        $plan = Plan::findOrFail($request->get('plan'));
        $user = Auth::user();
        $paymentMethod = $request->get('stripePaymentMethod');
        //dd($paymentMethod);
        $user->newSubscription('default', $plan->stripe_id)->create($paymentMethod);

      //  dd('subscribe successful!!!');
        return redirect('/profile/'.$user->name)->with('success', 'Your plan subscribed successfully');
    }

    public function update(Request $request, Plan $plan)
    {
        $plan = Plan::findOrFail($request->get('plan'));
        $user = Auth::user();
        $paymentMethod = $request->get('stripePaymentMethod');
        //dd($paymentMethod);
        $user->subscription('default')->swapAndInvoice($plan->stripe_id);
      //  dd('subscribe successful!!!');
        return redirect('/profile/'.$user->name)->with('success', 'Your plan has been updated successfully');
    }
}
