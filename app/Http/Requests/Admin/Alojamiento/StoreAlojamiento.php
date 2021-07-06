<?php

namespace App\Http\Requests\Admin\Alojamiento;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreAlojamiento extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.alojamiento.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'direccion' => ['required', 'string'],
            'email' => ['required', 'email', 'string'],
            'localidad' => ['required'],
            'nombre' => ['required', 'string'],
            'telefono' => ['required', 'string'],
            'tipo' => ['required', 'string'],
            'web' => ['required', 'string'],

        ];
    }

    /**
    * Modify input data
    *
    * @return array
    */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }

    public function getLocalidadId()
    {
        if ($this->has('localidad')){
            return $this->get('localidad')['id'];
        }
        return null;
    }
}
