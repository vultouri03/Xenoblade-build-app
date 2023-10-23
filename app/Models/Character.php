<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = [
        'name',
        'class',
        'gem_1',
        'gem_2',
        'gem_3',
        'level',
        'accessory_1',
        'accessory_2',
        'accessory_3',
        'art_1',
        'art_3',
        'art_2',
        'master_art_3',
        'master_art_2',
        'master_art_1',
        'master_skill_3',
        'master_skill_2',
        'master_skill_1',
        'build_id',

    ];
}
