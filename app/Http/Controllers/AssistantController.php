<?php

namespace App\Http\Controllers;

use App\Character;
use Illuminate\Http\Request;

class AssistantController extends Controller
{
    public function index()
    {
        $character = Character::all()->first();

        return view('assistant', compact('character'));
    }
}
