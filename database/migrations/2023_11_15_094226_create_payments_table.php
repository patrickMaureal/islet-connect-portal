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
		Schema::create('payments', function (Blueprint $table) {
			$table->uuid('id')->primary();
			$table->string('code')->index();
			$table->bigInteger('code_counter')->index();
			$table->foreignUuid('booking_id')->constrained()->onDelete('cascade');
			$table->string('or_number')->index()->unique();
			$table->decimal('amount', 10, 2)->index();
			$table->timestamp('payment_date')->index();
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('payments');
	}
};
