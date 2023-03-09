<?php

namespace App\Http\Requests\Tss;

use Illuminate\Foundation\Http\FormRequest;

class SendRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'text'=> 'string',
            'id_cpu'=> 'integer',
            'id_lan' => 'integer',
            'id_raid' => 'integer',
            'fio'=> 'string|nullable',
            'phone'=> 'string|nullable',
            'email'=> 'string|nullable',
            'comment'=> 'string|nullable'
        ];
    }
}
