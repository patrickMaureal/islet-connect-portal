<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
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
			'name' 								=> ['required', 'string'],
			'email' 							=> [
				'required',
				'email:rfc,dns,spoof,filter',
				Rule::unique('users', 'email')->ignore($this->user)->whereNull('deleted_at')
			],
			'role' 		            => [
				'required',
				Rule::exists('roles', 'name')
			],
			'password'						=> [
				'nullable',
				'confirmed',
				Password::min(8)
					->letters()
					->mixedCase()
					->numbers()
					->symbols()
					->uncompromised(),
			],
			'region'   						=> ['required', 'string'],
			'province'   					=> ['required', 'string'],
			'municipality'   			=> ['required', 'string'],
		];
	}
}
