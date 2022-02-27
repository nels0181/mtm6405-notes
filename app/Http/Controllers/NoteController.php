<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    public function index () {
        $title = "Notes";
        $search = request('search');

        if ($search) {
            $notes = Note::where('title', 'like', "%{$search}%")
                        ->orWhere('text', 'like', "%{$search}%")
                        ->get();
        } else {
            $notes = Note::all();
        }

        return view('notes', ['title' => $title, 'notes' => $notes]);
    }

    public function show ($id) {
        $note = Note::find($id);
        return view('note', $note);
    }
}