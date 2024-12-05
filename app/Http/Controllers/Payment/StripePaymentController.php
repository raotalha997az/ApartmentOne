<?php

namespace App\Http\Controllers\Payment;

use Stripe;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\SendPaymentSuccessEmail;
use Illuminate\Http\RedirectResponse;



class StripePaymentController extends Controller

{

    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function stripe(): View

    {

        return view('payment.stripe');

    }



    /**

     * success response method.

     *

     * @return \Illuminate\Http\Response

     */

    public function stripePost(Request $request): RedirectResponse

    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([

                "amount" => 10 * 100,

                "currency" => "usd",

                "source" => $request->stripeToken,

                "description" => "Test payment from SearchGlobal.com."

        ]);


        $user = auth()->user();
        $user->payment_status = true;
        $user->payment_expires_at = now()->addDays(90);
        $user->save();
        SendPaymentSuccessEmail::dispatch($user);
        return redirect()->route('tenant.properties')->with('success', 'Payment successful!');

    }

}
