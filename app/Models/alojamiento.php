<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alojamiento extends Model
{
    protected $fillable = [
        'direccion',
        'email',
        'localidad_id',
        'nombre',
        'telefono',
        'tipo',
        'web',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/alojamientos/'.$this->getKey());
    }

    public function localidad()
    {
        return $this->hasOne(Localidade::class, 'id','localidad_id');
    }
}
