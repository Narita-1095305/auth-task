<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTask extends FormRequest
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
            'title' => 'required|max:100',
            'status' => 'required|integer|min:1|max:3',
            'due_date' => 'required|date|after_or_equal:today',
            'progress' => 'required|integer|min:0|max:100',
            'comment' => '',
        ];
    }
    /**
     * attributesの日本語訳追加
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => 'タイトル',
            'due_date' => '期限日',
            'progress' => '進捗',
        ];
    }

    /**
     * messagesの日本語訳追加
     *
     * @return array
     */
    public function messages()
    {
        return [
            'due_date.after_or_equal' => ':attribute には今日以降の日付を入力してください。',
        ];
    }
}
