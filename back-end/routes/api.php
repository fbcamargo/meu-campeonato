<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\LeagueController;
use App\Http\Controllers\Api\TeamController;
use Illuminate\Support\Facades\Route;

Route::post("login", [ApiController::class, "login"]);

Route::group([
    "middleware" => ["auth:api"]
], function () {
    Route::post("store", [ApiController::class, "store"]);
    Route::post("logout", [ApiController::class, "logout"]);

    // League
    Route::get("leagues", [LeagueController::class, "all"]);
    Route::post("leagues", [LeagueController::class, "store"]);
    Route::get("leagues/{id}", [LeagueController::class, "show"]);
    Route::delete("leagues/{id}", [LeagueController::class, "destroy"]);

    // Team
    Route::get("teams", [TeamController::class, "all"]);
    Route::post("teams", [TeamController::class, "store"]);
    Route::get("teams/{id}", [TeamController::class, "show"]);
    Route::delete("teams/{id}", [TeamController::class, "destroy"]);
});
