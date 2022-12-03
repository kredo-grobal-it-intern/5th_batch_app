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


    public function index()
    {
        return view('donates.req_su');
    }

    public function pay_price(Request $request)
    {
        $request->validate([
            'amount'         => 'required',
        ]);

        $this->donation->amount       = $request->amount;
        $this->donation->save();

        return redirect()->back();
    }

    public function checkout()
    {
        $all_donations = $this->donation->latest()->get();
        $line_items = [];
        foreach($all_donations as $donation){
            $line_item = [
            'price_data' => [
                'currency' => 'jpy',
                'product_data' => [
                'name' => 'donation',
                'description' => 'Your donations creates feature for animal',
                ],
                'unit_amount' => $donation->amount,
             ],
              'quantity' => 1,
            ];
            array_push($line_items,$line_item);
        }

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $session = \Stripe\Checkout\Session::create([
                    'payment_method_types' => ['card'],
                    'line_items' => [$line_items],
                    'success_url' => route('card.success'),
                    'cancel_url' => 'http://localhost:4242/cancel',
                    'mode'                 => 'payment',
                ]);

          return view('donates.checkout', [
            'session' => $session,
            'publicKey' => env('STRIPE_PUBLIC_KEY')
        ]);
    }


    public function destroy($id)
    {

        $this->donation->destroy($id);
        return redirect()->back();
    }

    public function pay()
    {
        return view('donates.pay');
    }

    public function success()
    {
        DB::table('donations')->truncate();
        // Donation::table('donations')->delete();
        // $donation_id = Session::get('donation');
        // Donation::where('donations_id', $donation_id)->delete();
        return redirect(route('help_animal_top.index'));
    }
}
