<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationRequest extends FormRequest
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
            'name'                  =>     'required|max:50',
            'email'                 =>     'required|unique:admins,email|max:50|email',
            'role_id'               =>     'required',
            'password'              =>     'required|max:50|min:8',
            'phone'                 =>     'required|numeric',
        ];
    }
    public function messages(){
        return[
            'email.required'        =>     'يرجى ادخال البريد الالكتروني  والمحاولة مرة أخرى',
            'email.email'           =>     'يرجى ادخال بريد الكتروني صالح @ والمحاولة مرة أخرى',
            'email.max'             =>     'لايمكن ان تتجاوز 50 محرفا حاول مرة اخرى ',
            'email.unique'          =>     'البريد الالكتروني موجود مسبقا حاول مرة اخرى ',
            'name.required'         =>     'لا يمكن ان يكون الحقل فارغا اعد المحاولة مرة أخرى',
            'name.max'              =>     'لايمكن ان تتجاوز 50 محرفا حاول مرة اخرى ',
            'phone.required'        =>     'يرجى ادخال  رقم الهاتف  والمحاولة مرة أخرى',
            'phone.numeric'         =>     'لا يمكن ان يحتوي الرقم على محرف اعد المحاولة مرة أخرى',
            'phone.min'             =>     'رقم الهاتف غير صالح يجب ان يحتوي على 10 ارقام فقط',
            'phone.max'             =>     'رقم الهاتف غير صالح يجب ان يحتوي على 10 ارقام فقط',
            'password.max'          =>     'لايمكن ان تتجاوز 50 محرفا حاول مرة اخرى ',
            'password.min'          =>     'يجب ان لا تقل كلمة المرور عن 8 محارف',
            'password.required'     =>     'يرجى ادخال  كلمة المرور  والمحاولة مرة أخرى',
           // 'email.exists'          =>     'البريد الالكتروني  موجود مسبقا حاول مرة اخرى ',

        ];
    }
}
