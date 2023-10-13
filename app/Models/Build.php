<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Build extends Model
{
    protected $fillable = [
        'name',
        'hero_id',
        'user_id',
        'description',
        'is_active',
    ];

    public function hero(): BelongsTo
    {
        return $this->Belongsto(Hero::class);
    }
    public function characters(): HasMany
    {
        return $this->hasMany(Character::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
