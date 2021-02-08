<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\Rule;

class ItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
        // true に変更
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
            'name' => ['required','string'],
            'code' => ['required','string',
                         Rule::unique('items')->ignore($this->id)],
            'price' => ['required','min:0','integer'],
            'amount' => ['integer','min:0','max:10000'],
        ];
    }

    public function message()
    {
        return [
            'amount.integer' => Lang::get('message.amount_invaild'),
            'price.integer' => Lang::get('message.price_invaild'),
            'code.unique' => Lang::get('message.code_invaild'),

            // 'price.integer' => '値段が正しくありません',
        ];
    }
}
