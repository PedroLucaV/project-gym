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
        Schema::create("booking", function(Blueprint $table){
            $table->uuid('id')->primary();
            $table->dateTime('booking_date');
            $table->dateTime('finished_date');
            $table->timestamps();

            $table->foreignUuid('user_id')->nullable()->constrained('users', 'id')->onDelete('set null');
            $table->foreignUuid('equipament_id')->nullable()->constrained('equipaments', 'id')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
