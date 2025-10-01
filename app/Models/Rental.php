<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    /**
     * La clave primaria de la tabla.
     */
    protected $primaryKey = 'rental_id';

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
        'rental_date',
        'inventory_id',
        'customer_id',
        'return_date',
        'staff_id'
    ];

    /**
     * Los atributos que deben convertirse.
     *
     * @var array
     */
    protected $casts = [
        'rental_date' => 'datetime',
        'return_date' => 'datetime',
        'last_update' => 'datetime',
    ];

    /**
     * Relación pertenece a Film (a través de inventory)
     */
    public function film()
    {
        return $this->belongsTo(Film::class, 'inventory_id', 'film_id');
    }

    /**
     * Scope para rentas activas (no devueltas)
     */
    public function scopeActive($query)
    {
        return $query->whereNull('return_date');
    }

    /**
     * Scope para rentas completadas (devueltas)
     */
    public function scopeCompleted($query)
    {
        return $query->whereNotNull('return_date');
    }
}
