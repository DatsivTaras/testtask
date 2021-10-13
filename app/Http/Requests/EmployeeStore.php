<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStore extends FormRequest
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
            'name' => 'required|min:2',
            'surname' => 'required|min:2',
            'departments' => 'required',
            'salary' => 'int',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.min' => 'Не менее двух букв',
            'name.required' => 'Это поле не может быть пустым',
            'surname.required' => 'Это поле не может быть пустым',
            'departments.required' => 'Это поле не может быть пустым'
        ];
    }
}
