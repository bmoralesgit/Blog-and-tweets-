<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Entry extends Model
{
    use HasFactory;
    //$entry->user
    //Entry N - 1 user
    //Eager loading
    public function user(){
        return $this->belongsTo(User::class);
    }

    //mutator
    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug']= Str::slug($value);
    }

    /* public function getRouteKeyName()
    {
        return 'slug';
    } */

    public function getUrl(){
       return  url("entries/$this->slug-$this->id");
    }

}
