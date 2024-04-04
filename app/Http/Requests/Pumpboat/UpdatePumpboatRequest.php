<?php

namespace App\Http\Requests\Pumpboat;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePumpboatRequest extends FormRequest
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
			'name' 							=>
			[
				'required',
				'string',
				Rule::unique('pumpboats', 'name')->ignore($this->pumpboat),
			],
			'reg_number'				=>
			[
				'required',
				'string',
				Rule::unique('pumpboats', 'reg_number')->ignore($this->pumpboat),
			],
			'total_passenger_capacity'	=> ['required', 'numeric'],
			'description'								=> ['required', 'string'],
			'dimension_width'						=> ['required', 'string'],
			'dimension_length'					=> ['required', 'string'],
			'dimension_depth'						=> ['required', 'string'],
			'fuel_type'									=> ['required', 'string'],
			'hull_material'							=> ['required', 'array'],
			'hull_material.*'						=> ['required', 'string'],
			'safety_equipment'					=> ['required', 'array'],
			'safety_equipment.*'				=> ['required', 'string'],
			'owner'											=>
			[
				'required',
				Rule::exists('residents', 'id')
			],
			'captain'						=>
			[
				'required',
				Rule::exists('residents', 'id')
			],
			'amenities'					=> ['required', 'array'],
			'amenities.*'				=> ['required', 'string'],
			'cover_photo'       => ['nullable', 'file'],
			'file'							=> ['nullable', 'array'],
			'file.*'						=> ['nullable', 'file'],

		];
	}
}
