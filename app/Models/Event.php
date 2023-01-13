<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image', 'body'];

    public function eventCategory()
    {
        return $this->belongsTo(EventCategory::class);
    }

    public function dogs()
    {
        return $this->belongsToMany(Dog::class)->withTimestamps();
    }
}