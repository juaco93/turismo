<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $fillable = [
        'nombre',
        'provincia_id',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/departamentos/'.$this->getKey());
    }

    public function provincia() {
        return $this->belongsTo(Provincia::class);
    }

    public function localidades()
    {
        return $this->hasMany(Localidade::class);
    }

}
