<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "league_id"
    ];

    public function league(): HasOne
    {
        return $this->hasOne(League::class, "id", "league_id");
    }
}
