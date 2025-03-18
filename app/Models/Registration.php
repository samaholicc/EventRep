<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $fillable = ['event_id', 'first_name', 'last_name', 'email'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}