<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use App\Models\User\User;



class ProfileUpdateRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
	 */
	public function rules(): array
	{
		return [
			'name' => ['string', 'max:255',Rule::unique('users')],
			'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
		];
	}
}
