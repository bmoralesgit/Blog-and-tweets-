<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(){
       /// dd(_vars: 'GuestController');
      // $entries = Entry::all();
        $entries= Entry::with('user')
        ->orderByDesc('created_at')
        ->orderByDesc('id')
        ->paginate(10);
        return view('welcome', compact('entries'));
    }
    public function show(Entry $entry)
    {
            return view('entries.show', compact('entry'));
    }
}
