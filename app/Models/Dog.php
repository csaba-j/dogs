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
        'image',
        'reference_image_id',
        'reference_image_name',
        'rex',
        'short_legs',
        'suppressed_tail',
        'temperament',
        'weight_imperial',
        'wikipedia_url',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'experimental' => 'boolean',
        'hairless' => 'boolean',
        'hypoallergenic' => 'boolean',
        'natural' => 'boolean',
        'rare' => 'boolean',
        'rex' => 'boolean',
        'short_legs' => 'boolean',
        'suppressed_tail' => 'boolean',
        'is_admin' => 'boolean',
        'image' => 'array'
    ];

    /**
     * Scope a query to search by name.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $name
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeName($query, $name)
    {
        return $query->where('name', 'like', '%'.$name.'%');
    }

    /**
     * Scope a query to search by temperament.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string $temperament
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTemperament($query, $temperament)
    {
        return $query->where('temperament', 'like', '%'.$temperament.'%');
    }
}
