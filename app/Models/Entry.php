<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;
    //$entry->user
    //Entry N - 1 user
    //Eager loading
    public function user(){
        return $this->belongsTo(User::class);
    }
}
