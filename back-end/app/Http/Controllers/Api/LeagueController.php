<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\League;
use Illuminate\Http\Request;

class LeagueController extends Controller
{
    function all() {
        return League::all();
    }

    function store(Request $request) {
        $request->validate([
            "name" => "required"
        ]);

        League::create([
            "name" => $request->name,
            "status" => 0
        ]);

        return response()->json([
            "status" => true,
            "message" => "Campeonato criado com sucesso!"
        ]);
    }

    function show($id) {
        return League::find($id);
    }

    function destroy($id) {
        $league = League::find($id);
        
        if($league->status == 1) {
            return response()->json([
                "status" => false,
                "message" => "O campeonato já foi finalizado"
            ]); 
        }

        $league->delete();

        return response()->json([
            "status" => 1,
            "message" => "Campeonato excluído com sucesso!"
        ]);
    }
}
