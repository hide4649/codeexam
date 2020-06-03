<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'image'=>'file|image|max:3000|mimes:jpeg,png',
            'title' => 'required|max:50',
            'body'=>'required|',
            'user_id'=>'required|numeric',
            'category_id'=>'required|numeric'
        ];
    }

    public function messages(){
        return [
          'title.required' => 'タイトルを入力してください',
          'title.max:55' => 'タイトルはしてください',
          'body.required' => '本文を入力してください',
          'category_id.numeric' =>'言語を選択してください'
        ];
    }
}
