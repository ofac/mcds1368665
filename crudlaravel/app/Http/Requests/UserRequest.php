<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if($this->isMethod('PUT'))
        {
            return [
                'name'     => 'required|min:6',
                'email'    => 'required|email',
                'role'     => 'required',
            ];
        } else {
            return [
                'name'     => 'required|min:6',
                'email'    => 'required|email|unique:users',
                'password' => 'required|min:6',
                'role'     => 'required',
                'photo'    => 'required|image'
            ];
        }
    }
    public function messages()
    {
        return [
            'name.required'     => 'El campo Nombre Completo es requerido.',
            'name.min'          => 'El campo Nombre Completo debe tener al menos 6 caracteres.',
            'email.required'    => 'El campo Correo Electrónico es requerido.',
            'email.unique'      => 'La Dirección de Correo Electrónico ya existe.',
            'password.required' => 'El campo Contraseña es requerido.',
            'password.min'      => 'El campo Contraseña debe tener al menos 6 caracteres.',
            'role.required'     => 'El campo Rol es requerido.',
            'photo.required'    => 'El Foto es requerido.'
        ];
    }
}
