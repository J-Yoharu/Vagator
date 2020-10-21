<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApplicantRequest extends FormRequest
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
            'email' => 'required',
            'file' => 'required|image',
            'name' => 'required',
            'phone' => 'required',
            'surname' => 'required',
            'why_hire' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'O campo de e-mail é obrigatório',
            'file.required' => 'O campo de arquivo é obrigatório',
            'file.image' => 'O campo de arquivo tem que ser uma imagem',
            'name.required' => 'O campo nome é obrigatório',
            'phone.required' => 'O campo de telefone é obrigatório',
            'surname.required' => 'O campo de sobre nome é obrigatório',
            'why_hire.required' => 'O campo motivo de contratação é obrigatório',
        ];
    }
}
