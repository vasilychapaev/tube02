<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
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
            'name' => 'required|min:1',
            'usermovie' => 'required',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле "Название" обазательно для заполнения',
//            'name.min' => 'Поле name должно быть более 1 символа',
//            'usermovie.required' => 'Файл не выбран',
//            'description.required' => 'Не заполнено поле description',
        ];
    }
}
