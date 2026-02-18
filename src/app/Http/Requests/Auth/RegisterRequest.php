<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * ユーザーがこのリクエストを行う権限があるか確認
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * バリデーションルールの定義
     */
    public function rules(): array
    {
        return [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], // password_confirmationが必要
        ];
    }

    /**
     * エラーメッセージのカスタマイズ（FamilyPalette仕様）
     */
    public function messages(): array
    {
        return [
            'name.required'     => 'あなたのお名前を教えてください。',
            'email.required'    => 'メールアドレスの入力が必要です。',
            'email.email'       => '正しいメールアドレスの形式で入力してください。',
            'email.unique'      => 'このメールアドレスは既にパレットに登録されています。',
            'password.required' => 'パスワードを設定してください。',
            'password.min'      => 'パスワードは8文字以上で、大切に保管してください。',
            'password.confirmed' => '確認用のパスワードが一致しません。',
        ];
    }
}
