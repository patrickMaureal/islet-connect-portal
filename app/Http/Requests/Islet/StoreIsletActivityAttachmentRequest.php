<?php

namespace App\Http\Requests\Islet;

use Illuminate\Foundation\Http\FormRequest;

class StoreIsletActivityAttachmentRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 */
	public function authorize(): bool
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
	 */
	public function rules(): array
	{
		return [
			'attachments'		=> ['required', 'array'],
			'attachments.*' => ['required', 'file', 'mimes:jpg,bmp,png'],
		];

	}
}
