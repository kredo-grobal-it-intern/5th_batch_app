<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Stripe\Stripe;
use Stripe\Charge;
use App\Models\Donation;

class CardController extends Controller
{
    private $donation;

    public function __construct(Donation $donation)
    {
        $this->donation = $donation;
    }

    // Donation Method page
    public function index()
    {
        return view('donates.req_su');
    }

    // Card checkout page
    public function pay()
    {
        return view('donates.pay');
    }

   // input pay_amount
    public function pay_price(Request $request)
    {
        $request->validate([
            'amount'         => 'required',
            // 'facility'       => 'required'
        ]);

        $price_data = Donation::all()->first();

        if($price_data == null){
            $this->donation->amount       = $request->amount;
            // $this->donation->facility       = $request->facility;
            $this->donation->save();
        }else{
            DB::table('donations')->truncate();
            $this->donation->amount       = $request->amount;
            $this->donation->save();
        }

        return redirect()->route('card.checkout');

    }

    public function checkout()
    {
        $all_donations = $this->donation->latest()->get();

        foreach($all_donations as $donation){
                 $donation->amount;
          }

          $stripe = new \Stripe\StripeClient(
            'sk_test_51M8JNHK3NRhPPLZhLgpFivFnzAwXPfr09Zy62rM1LTb6JHKaPMPBWAqOoQPAyxAh2cVVBXP9ZbFf1eMBKlGHYJdn00BPaYDiIF');
            $amount =  $donation->amount;

            $payment_intent = $stripe->paymentIntents->create([
                    'payment_method_types' => ['card'],
                    'amount' => $amount,
                    'currency' => 'jpy',
                    'confirm' => true,
                ]);
                // dd($payment_intent);
                // $payment_intent_id = $payment_intent->id;

                // $stripe->paymentIntents->confirm(
                //     $payment_intent_id,
                //     ['payment_method' => 'card']
                //   );

                return view('donates.index');

    }





    public function success()
    {
        $price_data = Donation::all()->first();
        $price_data->delete();
        return redirect(route('help_animal_top.index'));
    }


}
