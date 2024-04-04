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
		Schema::create('contact_information', function (Blueprint $table) {
			$table->uuid('id')->primary();
			$table->foreignUuid('booking_id')->constrained()->onDelete('cascade');
			$table->string('name');
			$table->string('email');
			$table->string('phone');
			$table->string('address');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('contact_information');
	}
};
