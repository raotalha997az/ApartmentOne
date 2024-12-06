<?php

namespace App\Http\Controllers\Payment;

use Stripe\Stripe;
use Stripe\Charge;
use App\Models\Payment;
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

    // public function stripePost(Request $request): RedirectResponse

    // {

    //     Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    //     Stripe\Charge::create ([

    //             "amount" => 10 * 100,

    //             "currency" => "usd",

    //             "source" => $request->stripeToken,

    //             "description" => "Test payment from SearchGlobal.com."

    //     ]);


    //     $user = auth()->user();
    //     $user->payment_status = true;
    //     $user->payment_expires_at = now()->addDays(90);
    //     $user->save();
    //     SendPaymentSuccessEmail::dispatch($user);
    //     return redirect()->route('tenant.properties')->with('success', 'Payment successful!');

    // }


    public function stripePost(Request $request): RedirectResponse
{
    // Set Stripe API Key
    Stripe::setApiKey(env('STRIPE_SECRET'));

    try {

            $user = auth()->user();

        // Count the number of payments the user has made
        $paymentCount = Payment::where('user_id', $user->id)->count();
        $paymentDescription = 'Paid ' . ($paymentCount + 1) . ' time' . ($paymentCount + 1 > 1 ? 's' : '');

        // Create Stripe Charge
        $charge = Charge::create([
            "amount" => 10 * 100, // Amount in cents
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => $paymentDescription,
        ]);

        // Get the authenticated user
        $user = auth()->user();

        // Save payment record
        Payment::create([
            'user_id' => $user->id,
            'payment_method' => 'stripe',
            'transaction_id' => $charge->id,
            'amount' => $charge->amount / 100, // Convert cents to dollars
            'currency' => $charge->currency,
            'description' => $charge->description,
            'paid_at' => now(),
        ]);

        // Update user payment status
        $user->update([
            'payment_status' => true,
            'payment_expires_at' => now()->addDays(90),
        ]);

        // Dispatch success email job
        SendPaymentSuccessEmail::dispatch($user);

        // Redirect with success message
        return redirect()->route('tenant.properties')->with('success', 'Payment successful!');
    } catch (\Exception $e) {
        // Handle exceptions and return an error message
        return redirect()->back()->with('error', 'Payment failed! Please try again.');
    }

}
}
