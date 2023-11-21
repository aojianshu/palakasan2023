<?php

namespace App\Http\Controllers;

use App\Models\Score;
use App\Models\Team;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function store(Request $request)
    {
        for ($i = 0; $i < count($request->score); $i++) {
            Score::create(
                [
                    'team_id' => $i + 1,
                    'game_id' => $request->game_id,
                    'score' => $request->score[$i],
                ]
            );
        }

        return redirect()->route('dashboard');
    }
}
