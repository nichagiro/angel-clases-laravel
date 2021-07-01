<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class peopleRequest extends FormRequest
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
            "name" => "required|min:3",
            "img" => "image",
            "job" => "required",
            "img" => "required|image|max:2000"
        ];
    }
    public function attributes(){
        return[
            "name" => "Nombre",
            "job" => "Trabajo",
            "img" => "Imagen",
        ];
    }
    public function messages(){
        return[
            "name.required" => "No dejes el campo vacio caballero",
            "name.min:3" => "El nombre esta muy corto",
            "job.required" => "Selecciona porfavor un trabajo de nuestro listado",
            "img.image" => "Sube las extensiones validas",
            "img.requred" => "Este campo no lo dejes vacio o el codigo se dañara",
        ];
    }


}
