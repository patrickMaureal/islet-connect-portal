<?php

namespace App\Http\Requests\Islet;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreIsletRequest extends FormRequest
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
			'name' => [
				'required',
				'string',
				Rule::unique('islets', 'name')
			],
			'total_population'  => ['required', 'numeric', 'min_digits:3'],
			'description'       => ['required', 'string'],
			'region'   					=> ['required', 'string'],
			'province'   				=> ['required', 'string'],
			'municipality'   		=> ['required', 'string'],
			'barangay'   				=> ['required', 'string'],
			'latitude'       		=> ['required', 'string'],
			'longitude'       	=> ['required', 'string'],
			'cover_photo'       => ['required', 'file'],
			'file'       				=> ['required', 'array'],
			'file.*'       			=> ['required', 'file'],
		];
	}

	/**
	 * Prepare the data for validation.
	 */
	protected function prepareForValidation(): void
	{
		// directly add value to the request if user has LGU role
		if ( auth()->user()->hasRole('LGU') ) {
			$this->merge([
				'region'				=> auth()->user()->region,
				'province'			=> auth()->user()->province,
				'municipality'	=> auth()->user()->municipality,
			]);
		}
	}

}
