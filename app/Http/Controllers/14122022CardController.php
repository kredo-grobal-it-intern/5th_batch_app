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
            // 'facility'       => 'required'
        ]);

        //input pay_amount
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

        //conect stripe
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        // $token = $_POST['stripeToken'];
        $session = \Stripe\Checkout\Session::create([
                    'payment_method_types' => ['card'],
                    'line_items' => [$line_items],
                    'currency' => 'jpy',
                    'success_url' => route('card.success'),
                    'cancel_url' => 'http://localhost:4242/cancel',
                    'mode'                 => 'payment',
                    // 'source' => $token,
                ]);

                return view('donates.index', [
                    'session' => $session,
                    'publicKey' => env('STRIPE_PUBLIC_KEY')
                ]);

    }

    // public function checkout()
    // {
    //     $all_donations = $this->donation->latest()->get();
    //     $line_items = [];
    //     foreach($all_donations as $donation){
    //         $line_item = [
    //         'price_data' => [
    //             'currency' => 'jpy',
    //             'product_data' => [
    //             'name' => 'donation',
    //             'description' => 'Your donations creates feature for animal',
    //             ],
    //             'unit_amount' => $donation->amount,
    //          ],
    //           'quantity' => 1,
    //         ];
    //         array_push($line_items,$line_item);
    //     }

    //     \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
    //     // $token = $_POST['stripeToken'];
    //     $session = \Stripe\Checkout\Session::create([
    //                 'payment_method_types' => ['card'],
    //                 'line_items' => [$line_items],
    //                    'currency' => 'jpy',
    //                 'success_url' => route('card.success'),
    //                 'cancel_url' => 'http://localhost:4242/cancel',
    //                 'mode'                 => 'payment',
    //                 // 'source' => $token,
    //             ]);

    //       return view('donates.index', [
    //         'session' => $session,
    //         'publicKey' => env('STRIPE_PUBLIC_KEY')
    //     ]);
    // }


    public function pay()
    {
        return view('donates.pay');
    }

    public function success()
    {
        $price_data = Donation::all()->first();
        $price_data->delete();
        return redirect(route('help_animal_top.index'));
    }


}
