<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('residents', function (Blueprint $table) {
			$table->uuid('id')->primary();
			$table->string('first_name');
			$table->string('middle_name')->nullable();
			$table->string('last_name');
			$table->string('name_extension');
			$table->string('prefix');
			$table->string('gender');
			$table->string('email');
			$table->string('contact_number');
			$table->string('bloodtype');
			$table->string('physical_status');
			$table->string('birthplace');
			$table->date('birthdate');
			$table->string('marital_status');
			$table->string('employment_status');
			$table->string('evacuation_center');
			$table->string('region');
			$table->string('province');
			$table->string('municipality');
			$table->string('barangay');
			$table->string('street')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('residents');
	}
};
