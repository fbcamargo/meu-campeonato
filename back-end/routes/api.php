<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Support\Facades\Route;

Route::post("login", [ApiController::class, "login"]);

Route::group([
    "middleware" => ["auth:api"]
], function () {
    Route::post("store", [ApiController::class, "store"]);
    Route::post("logout", [ApiController::class, "logout"]);
});
