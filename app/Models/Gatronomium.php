<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gatronomium extends Model
{
    protected $fillable = [
        'nombre',
        'direccion',
        'ciudad',
        'departamento',
        'provincia',
        'telefono',
        'web',
        'email',
        'tipo',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/gatronomia/'.$this->getKey());
    }
}
