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
		Schema::create('booking_passengers', function (Blueprint $table) {
			$table->uuid('id')->primary();
			$table->foreignUuid('booking_id')->constrained()->onDelete('cascade');
			$table->string('name')->index();
			$table->bigInteger('age')->index();
			$table->string('sex')->index();
			$table->string('nationality')->index();
			$table->string('address')->index();
			$table->boolean('pwd')->index();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('booking_passengers');
	}
};
