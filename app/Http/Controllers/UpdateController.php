<?php

namespace App\Http\Controllers;

use App\Character;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function update(Request $request)
    {

        $value = collect($request->data)->first();
        $key = collect($request->data)->keys()->first();

        $character = Character::all()->first();
        $character->$key = $value;
        $character->save();

        return response()->json(['status' => 'success']);
    }
}
