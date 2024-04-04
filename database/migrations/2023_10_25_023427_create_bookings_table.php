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
		Schema::create('bookings', function (Blueprint $table) {
			$table->uuid('id')->primary();
			$table->string('code')->index();
			$table->bigInteger('code_counter')->index();
			$table->timestamp('scheduled_date_from')->nullable()->index();
			$table->timestamp('scheduled_date_to')->nullable()->index();
			$table->foreignUuid('pumpboat_id')->constrained()->onDelete('cascade');
			$table->string('status')->default('Pending')->index();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('bookings');
	}
};
