<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;
use PHPUnit\TextUI\XmlConfiguration\Variable;

class EntryController extends Controller
{
    public function create()
    {
        return view('entries.create');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request)
    {
        //dd($request->all());
        $validateData= $request->validate([
            'title' => 'required|min:7|max:255|unique:entries',
            'content' => 'required|min:25|max:3000'
        ]);

        $entry = new Entry();
        $entry->title = $validateData['title'];
        $entry->content = $validateData['content'];
        $entry->user_id = auth()->id();
        $entry->save();
        $status = "Your entry has been published successfully";
        return back()->with(compact('status'));
    }

    public function edit(Entry $entry){
        $this->authorize('update', $entry);
        return view('entries.edit', compact('entry'));
    }

    public function update(Request $request, Entry $entry)
    {
        $this->authorize('update', $entry);
        //dd($request->all());
        $validateData= $request->validate([
            'title' => 'required|min:7|max:255|unique:entries,id,'. $entry->id,
            'content' => 'required|min:25|max:3000'
        ]);
        //TODO: allow edit action only for the author.
       //auth -> id() === $entry->user_id
        $entry->title = $validateData['title'];
        $entry->content = $validateData['content'];

        $entry->save();
        $status = "Your entry has been updated successfully";
        return back()->with(compact('status'));
    }
}
