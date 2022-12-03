<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;
    // protected $gurarded = [];
    protected $fillable = ['donation_id','amount','updated_at','created_at'];
}

// $all_pages = Page::paginate(4);
