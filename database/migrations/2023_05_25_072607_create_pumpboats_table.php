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
		Schema::create('pumpboats', function (Blueprint $table) {
			$table->uuid('id')->primary();
			$table->string('name');
			$table->string('reg_number');
			$table->bigInteger('total_passenger_capacity');
			$table->string('description');
			$table->string('dimension_width');
			$table->string('dimension_length');
			$table->string('dimension_depth');
			$table->string('fuel_type');
			$table->text('hull_material');
			$table->text('safety_equipment');
			$table->text('amenities');
			$table->foreignUuid('owner')->references('id')->on('residents')->onDelete('cascade');
			$table->foreignUuid('captain')->references('id')->on('residents')->onDelete('cascade');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('pumpboats');
	}
};
