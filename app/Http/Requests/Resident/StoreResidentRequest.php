<?php

namespace App\Http\Requests\Resident;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class StoreResidentRequest extends FormRequest
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
			'first_name'          => ['required', 'string'],
			'middle_name'         => ['nullable', 'string'],
			'last_name'           => ['required', 'string'],
			'name_extension'      => ['required', 'string'],
			'prefix'                 => ['required', 'string'],
			'gender'                 => ['required', 'string'],
			'email'               => [
				'required',
				'email',
				Rule::unique('residents', 'email')
			],
			'contact_number'      => [
				'required',
				'numeric',
				'max_digits:11',
				'min_digits:11'
			],
			'bloodtype'           => ['required', 'string'],
			'physical_status'     => ['required', 'string'],
			'birthplace'          => ['required', 'string'],
			'birthdate'           => ['required', 'date'],
			'marital_status'      => ['required', 'string'],
			'employment_status'   => ['required', 'string'],
			'evacuation_center'   => ['required', 'string'],
			'region'   						=> ['required', 'string'],
			'province'   					=> ['required', 'string'],
			'municipality'   			=> ['required', 'string'],
			'barangay'   					=> ['required', 'string'],
			'street'   						=> ['nullable', 'string'],
		];
	}
}
