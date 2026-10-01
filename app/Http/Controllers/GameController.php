<?php

namespace App\Http\Controllers;

use App\Events\PlayerMoved;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        return view('game');
    }

    public function move(Request $request)
    {
        $data = $request->validate([
            'player_id' => ['required', 'integer'],
            'x' => ['required', 'integer', 'min:0', 'max:9'],
            'y' => ['required', 'integer', 'min:0', 'max:9'],
        ]);

        broadcast(new PlayerMoved(
            $data['player_id'],
            $data['x'],
            $data['y'],
        ));

        return response()->json([
            'success' => true,
        ]);
    }
}
