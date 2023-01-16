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
        return $this->belongsTo(EventCategory::class, 'category_id');
    }

    public function dogs()
    {
        return $this->belongsToMany(Dog::class, 'event_dog', 'event_id', 'dog_id')->withTimestamps();
    }
}
