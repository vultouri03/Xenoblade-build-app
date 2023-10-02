<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Build extends Model
{
    protected $fillable = [
        'name',
        'hero',
        'user_id',
    ];

    public function characters(): HasMany
    {
        return $this->hasMany(Character::class);
    }
}
