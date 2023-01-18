<?php

namespace App\Http\Controllers;

use App\Models\Donation;

class DonationController extends Controller
{
    private $donation;

    public function __construct(Donation $Donation)
    {
    }

    public function index()
    {
        return view('donates.animal_care');
    }
}
