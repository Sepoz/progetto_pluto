<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title'=>'required|min:3',
            'description'=>'required|max:144',
            'img' => '|image',
			'price' => 'required|numeric|gt:0',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'È obbligatorio inserire un titolo',
            'description.required' => 'È obbligatorio inserire il testo del tuo articolo',
            'title.min' => 'Il testo deve essere di minimo 3 caratteri',
            'description.max' => 'Il testo del tuo articolo deve essere di massimo 144 caratteri',
            'img.required' => 'Devi obbligatoriamente inserire un immagine',
            'img.image' => 'Deve essere un file .jpg, .webp',
			'price.required' => 'È obbligatorio inserire un prezzo',
			'price.numeric' => 'Il prezzo deve essere un numero',
			'price.gt' => 'Il prezzo deve essere maggiore di 0',
        ];
    }
}
