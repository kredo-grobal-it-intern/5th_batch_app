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
        return view('donates.pay_method');
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
        ]);

          \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
          \Stripe\Charge::create([
                    "amount" => (double) $request->amount,
                    'currency' => 'jpy',
                    "source" => $request->stripeToken,
                    "description" => "Donation for lovely pets"
                ]);

                return view('donates.help_animal_top');

    }

}
