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
        Schema::create('islet_pumpboat', function (Blueprint $table) {
					$table->id('id');
					$table->foreignUuid('islet_id')->constrained()->onDelete('cascade');
					$table->foreignUuid('pumpboat_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('islet_pumpboat');
    }
};
