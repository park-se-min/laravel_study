<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticlesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
	protected $dontFlash = ['files'];

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
            'title' => ['required'],
			'content' => ['required', 'min:1'],
			'files' => ['array'],
			'files.*' => ['mimes:jpg,png,zip,tar', 'max:30000'],
        ];
	 }

	 public function messages()
	 {
		return [
			'required' => ':attribute 필수',
			'min' => ':attribute 최소 :min 이상 필요.',
	  ];
	 }

	 public function attribute()
	 {
		return [
			'title' => '제목',
			'content' => '내용',
	  ];
	 }
}
