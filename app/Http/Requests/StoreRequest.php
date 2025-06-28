<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nameInput' => 'required|string|min:5|max:50',
            'emailInput' => 'required|email|unique:Contatcs,email',
            'contatoInput' => 'required|string|size:9|unique:Contatcs,contato',
        ];
    }
    public function messages() : array
    {
        return [
        'nameInput.required' => 'O campo nome é obrigatório.',
        'nameInput.string'   => 'O nome deve ser um texto.',
        'nameInput.min'      => 'O nome deve ter no mínimo 5 caracteres.',
        'nameInput.max'      => 'O nome deve ter no máximo 50 caracteres.',

        'emailInput.required' => 'O e-mail é obrigatório.',
        'emailInput.email'    => 'O e-mail deve ser um endereço válido.',
        'emailInput.unique'   => 'Este e-mail já está em uso.',

        'contatoInput.required' => 'O campo Contato é obrigatório.',
        'contatoInput.string'   => 'A Contato deve ser um texto.',
        'contatoInput.size'     => 'A Contato deve ter exatamente 9 caracteres.',
        'contatoInput.unique'   => 'Este Telefon já está em uso.',
        ];
    }
}
