<?php

namespace App\Http\Requests\Registration;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRegistrationRequest extends FormRequest
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
	 * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
	 */
	public function rules(): array
	{
		return [
			'name' 								=> ['required', 'string'],
			'email' 							=> [
				'required',
				'email',
				Rule::unique('users', 'email')
			],
			'birthdate' 					=> ['required', 'date'],
			'role' 					      => ['required', 'string'],
			'region'   						=> ['required', 'string'],
			'province'   					=> ['required', 'string'],
			'municipality'   			=> ['required', 'string'],
			'validation_document' => ['required','file'],
		];
	}
}
