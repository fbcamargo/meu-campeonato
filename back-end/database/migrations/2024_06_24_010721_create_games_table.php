<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("league_id");
            $table->unsignedBigInteger("adversary_id");
            $table->integer("adversary_score");
            $table->unsignedBigInteger("opponent_id");
            $table->integer("opponent_score");
            $table->tinyInteger("stage");
            $table->timestamps();

            $table->foreign('league_id')->references('id')->on('leagues');
            $table->foreign('adversary_id')->references('id')->on('teams');
            $table->foreign('opponent_id')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
