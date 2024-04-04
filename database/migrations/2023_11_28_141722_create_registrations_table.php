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
		Schema::create('registrations', function (Blueprint $table) {
			$table->uuid('id')->primary();
			$table->string('name');
			$table->string('email');
			$table->date('birthdate');
			$table->string('role');
			$table->string('status')->default('Unverified')->index();
			$table->string('region')->nullable();
			$table->string('province')->nullable();
			$table->string('municipality')->nullable();
			$table->timestamp('verified_at')->nullable();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('registrations');
	}
};
