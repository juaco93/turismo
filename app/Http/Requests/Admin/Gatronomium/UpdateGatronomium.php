<?php

namespace App\Http\Requests\Admin\Gatronomium;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateGatronomium extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.gatronomium.edit', $this->gatronomium);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nombre' => ['sometimes', 'string'],
            'direccion' => ['sometimes', 'string'],
            'ciudad' => ['sometimes', 'string'],
            'departamento' => ['sometimes', 'string'],
            'provincia' => ['sometimes', 'string'],
            'telefono' => ['sometimes', 'string'],
            'web' => ['sometimes', 'string'],
            'email' => ['sometimes', 'email', 'string'],
            'tipo' => ['sometimes', 'string'],
            
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
}
