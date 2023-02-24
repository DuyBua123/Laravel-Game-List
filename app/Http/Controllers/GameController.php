<?php

// relationship function/method works fine
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Benchmark;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function showGamePage() {
        return view('game-page');
    }

    public function index() {
        $games = Auth::user()->games()->paginate(5);
        return view('admin', ['games' => $games]);
        // return dd(Benchmark::measure(fn() => $games = Auth::user()->games()->paginate(5)));
    }

    public function store(Request $request) {
        Auth::user()->games()->create([
            'game_name' => $request->game_name,
            'description' => $request->description
        ]);

        return response()->json([
            'status' => 200,
            'message' => "Create new game sucessfully."
        ]);
    }

    public function getOneGame($id) {
        $game = Auth::user()->games()->find($id);
        return response()->json([
            'status' => 200,
            'game' => $game
        ]);
    }

    public function getLatestGame() {
        $latest_game = Auth::user()->games()->latest('created_at')->first();
        return response()->json([
            'status' => 200,
            'latest_game' => $latest_game
        ]);
    }

    public function update(Request $request, $id) {
        $game = Auth::user()->games()->find($id);

        $game->game_name = $request->game_name;
        $game->description = $request->description;

        $game->save();

        return response()->json([
            'status' => 200,
            'successMessage' => "Updated successfully",
            'game' => $game
        ]);
    }

    public function delete($id) {
        $game = Auth::user()->games()->find($id);
        $game->delete();

        return response()->json([
            'status' => 200,
            'message' => "Deleted game successfully"
        ]);
    }
}
