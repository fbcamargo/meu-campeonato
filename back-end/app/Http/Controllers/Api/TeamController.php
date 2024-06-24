<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    function all() {
        return Team::all();
    }

    function store(Request $request) {
        $request->validate([
            "name" => "required",
            "league_id" => "required"
        ]);

        if(Team::where("league_id", $request->league_id)->count() == 8) {
            return response()->json([
                "status" => true,
                "message" => "O campeonato já possui 8 times cadastrados" 
            ]);
        }

        Team::create([
            "name" => $request->name,
            "league_id" => $request->league_id
        ]);

        return response()->json([
            "status" => true,
            "message" => "Time adicionado com sucesso!" 
        ]);
    }

    function show($id) {
        return Team::with("league")->find($id);
    }

    function destroy($id) {
        $league = Team::find($id);
        $league->delete();

        return response()->json([
            "status" => 1,
            "message" => "Time excluído com sucesso!"
        ]);
    }
}
