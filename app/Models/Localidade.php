<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Localidade extends Model
{
    protected $fillable = [
        'departamento_id',
        'nombre',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/localidades/'.$this->getKey());
    }

    public function departamento() {
        return $this->belongsTo(Departamento::class);
    }
}
