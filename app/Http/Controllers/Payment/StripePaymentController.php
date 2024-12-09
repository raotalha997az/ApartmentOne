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
use App\Models\ExpTenantVantage4 as ExpTenantVantage4Model;
use App\Services\Experian\ExpTenantVantage4;




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


    public function stripePost(Request $request,ExpTenantVantage4 $experianApiService,): RedirectResponse
{
    // Set Stripe API Key
    Stripe::setApiKey(env('STRIPE_SECRET'));
    try {
        $user = auth()->user();

        // Count user payments
        $paymentCount = Payment::where('user_id', $user->id)->count();
        $paymentDescription = 'Paid ' . ($paymentCount + 1) . ' time' . ($paymentCount + 1 > 1 ? 's' : '');

        // Create Stripe Charge
        $charge = Charge::create([
            "amount" => 10 * 100, // Amount in cents
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => $paymentDescription,
        ]);

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

        // Fetch Experian Credit Report
        $experianData = $experianApiService->fetchCreditReport([
            "firstName" => "ANDERSON",
            "lastName" => "LAURIE",
            "nameSuffix" => "SR",
            "street1" => "9817 LOOP BLVD",
            "street2" => "APT G",
            "city" => "CALIFORNIA CITY",
            "state" => "CA",
            "zip" => "935051352",
            "ssn" => "666455730",
            "dob" => "1998-08-01",
            "phone" => "0000000000",
        ]);

        if ($experianData) {
            // Save the API response in the database
            ExpTenantVantage4Model::create([
                'user_id' => $user->id,
                'data' => json_encode($experianData), // Save response as JSON
            ]);
        } else {
            throw new \Exception('Failed to fetch Experian Credit Report');
        }

        // Dispatch success email job
        SendPaymentSuccessEmail::dispatch($user);

        // Redirect with success message
        return redirect()->route('tenant.properties')->with('success', 'Payment and credit report retrieval successful!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Payment or API error: ' . $e->getMessage());
    }

}
}
