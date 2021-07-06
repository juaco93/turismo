<?php

namespace App\Http\Requests\Admin\Gastronomia;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateGastronomia extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.gastronomia.edit', $this->gastronomium);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'direccion' => ['sometimes', 'string'],
            'email' => ['sometimes', 'email', 'string'],
            'localidad' => ['required'],
            'nombre' => ['sometimes', 'string'],
            'telefono' => ['sometimes', 'string'],
            'tipo' => ['sometimes', 'string'],
            'web' => ['sometimes', 'string'],

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

    public function getLocalidadId(){
        if ($this->has('localidad')){
            return $this->get('localidad')['id'];
        }
        return null;
    }
}
