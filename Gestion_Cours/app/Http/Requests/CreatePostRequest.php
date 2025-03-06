<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreatePostRequest extends FormRequest
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
            'nom' => 'required',
            'volume_heure' => 'required',
            'id_prof' => 'required'

        ];
    }

    public function failedValidation(Validator $validator)
    {
        // Renvoie une réponse JSON contenant les erreurs de validation
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => true,
            'message' => 'Erreur de validation',
            'errorList' => $validator->errors()
        ]));

    }
    public function messages() {
        return [
            'nom.required' => 'Le nom est obligatoire',
            'volume_horaore.required' => 'Le nom est obligatoire',
            'id_prof.required' => 'Le nom est obligatoire',

        ];
    }
}
