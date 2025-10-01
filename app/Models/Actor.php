<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    /**
     * La clave primaria de la tabla.
     */
    protected $primaryKey = 'actor_id';

    /**
     * Indica si el modelo debe manejar timestamps automáticamente.
     */
    public $timestamps = false;

    /**
     * Los nombres de las columnas de timestamp.
     */
    const UPDATED_AT = 'last_update';

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 
        'last_name'
    ];

    /**
     * Los atributos que deben convertirse.
     *
     * @var array
     */
    protected $casts = [
        'last_update' => 'datetime',
    ];

    /**
     * Relación muchos a muchos con Films
     */
    public function films()
    {
        return $this->belongsToMany(Film::class, 'film_actor', 'actor_id', 'film_id');
    }

    /**
     * Accessor para obtener el nombre completo
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
