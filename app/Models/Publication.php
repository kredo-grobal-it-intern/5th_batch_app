<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $table = 'pets';
    protected $fillable = ['image','user_id','name',            "date_of_brith", "breed", "weight","gender","pet_type", "netured_status","vaccination_status","charateristic","area","url"];
    // protected $gurarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
