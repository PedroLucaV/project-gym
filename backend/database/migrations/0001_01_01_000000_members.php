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
        Schema::create("members", function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('cpf', 14)->unique();
            $table->string('phone', 15);
            $table->string('address');
            $table->date('birthdate');
            $table->date('enrollment_date');
            $table->enum('contract_plan', ['plus', 'omega', 'ultra']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
