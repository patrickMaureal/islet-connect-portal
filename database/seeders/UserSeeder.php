<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use App\Models\User\User;

class UserSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		$user = User::create([
			'name'      						=> 'user',
			'email'     						=> 'test@test.com',
			'password'  						=> Hash::make('12345678'),
			'region'								=> 'Central Visayas',
			'province'							=> 'Cebu',
			'municipality'					=> 'City of Cebu',
			'email_verified_at'			=> Carbon::now(),
		]);

		$user->assignRole('Administrator');
	}
}
