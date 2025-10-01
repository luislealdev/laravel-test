<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    /**
     * La clave primaria de la tabla.
     */
    protected $primaryKey = 'film_id';

    /**
     * Indica si el modelo debe manejar timestamps automáticamente.
     */
    public $timestamps = false;

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'release_year',
        'language_id',
        'rental_duration',
        'rental_rate',
        'length',
        'replacement_cost',
        'rating',
        'special_features'
    ];

    /**
     * Los atributos que deben convertirse.
     *
     * @var array
     */
    protected $casts = [
        'release_year' => 'integer',
        'rental_duration' => 'integer',
        'rental_rate' => 'decimal:2',
        'length' => 'integer',
        'replacement_cost' => 'decimal:2',
        'last_update' => 'datetime',
    ];

    /**
     * Relación muchos a muchos con Actors
     */
    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'film_actor', 'film_id', 'actor_id');
    }

    /**
     * Relación uno a muchos con Rentals
     */
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
