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
        Schema::create('islets', function (Blueprint $table) {
					$table->uuid('id')->primary();
					$table->string('name');
					$table->integer('total_population');
					$table->text('description');
					$table->string('region');
					$table->string('province');
					$table->string('municipality');
					$table->string('barangay');
					$table->string('latitude');
					$table->string('longitude');
					$table->timestamps();
					$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('islets');
    }
};
