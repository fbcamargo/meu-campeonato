<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        "league_id",
        "adversary_id",
        "adversary_score",
        "opponent_id",
        "opponent_score",
        "stage"
    ];

    public function league(): HasOne
    {
        return $this->hasOne(League::class, "league_id");
    }

    public function adversary(): HasOne
    {
        return $this->hasOne(Team::class, "adversary_id");
    }

    public function opponent(): HasOne
    {
        return $this->hasOne(Team::class, "opponent_id");
    }
}
