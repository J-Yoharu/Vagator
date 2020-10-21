<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
        return [
            'title' => 'required',
            'department_id' => 'required',
            'locale_id' => 'required',
            'type_id' => 'required',
            'is_remote' => 'required',
            'description' => 'required|min:20',
            'user_id' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'O campo de titulo é obrigatório',
            'department_id.required' => 'O campo de departamento é obrigatório',
            'locale_id.required' => 'O campo de localização é obrigatório',
            'type_id.required' => 'O campo de tipo é obrigatório',
            'is_remote.required' => 'O campo de remoto tem que ser verdadeiro ou falso',
            'description.required' => 'O campo de descrição é obrigatório',
            'description.min' => 'O campo de descrição tem que ter no mínimo 20 caracteres',
            'user_id.required' => 'Não há usuário logado na sessão, favor logar novamente',
        ];
    }
}
