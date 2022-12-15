<?php

namespace App\Http\Controllers;
use App\Enums\DonationType;
use Illuminate\Http\Request;
use App\Models\Donation;

class DonationController extends Controller
{
    private $donation;

    public function __construct(Donation $Donation)
    {

    }

    public function index()
    {
        return view('donates.index');
    }

}
