<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => false,
            'erros' => $validator->errors(),

        ], 422));
    }
  
    public function rules(): array
    {

        $userId = $this->route('user');
        return [
            'name' =>'required',
            'email' => 'required|email|unique:users,email,' . ($userId ? $userId->id : null) ,
            'password' => 'required|min:6'
        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => 'Campo nome é obrigatorio!',
            'email.required' => 'Campo e-mail é obrigatorio!',
            'email.email' => 'Necessario enviar e-mail válido!',
            'email.unique' => 'o e-mail ja esta cadastrado',
            'password.required' => 'Campo senha é obrigatorio!',
            'password.min' => 'Senha com no minimo :min caracteres!',
        ];
    }
}
