<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    //use HasFactory;

    protected $fillable = [
        'alt_names',
        'experimental',
        'hairless',
        'hypoallergenic',
        'life_span',
        'natural',
        'name',
        'origin',
        'rare',
        'reference_image_id',
        'reference_image_name',
        'reference_image_url',
        'rex',
        'short_legs',
        'suppressed_tail',
        'temperament',
        'weight_imperial',
        'wikipedia_url',
    ];
}
