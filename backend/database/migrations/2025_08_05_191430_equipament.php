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
        Schema::create("equipaments", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("name");
            $table->string("brand");
            $table->string("model");
            $table->year("fabrication_year");
            $table->smallInteger('max_capacity');
            $table->string('localization');
            $table->enum('state', ['new', 'used', 'broken']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipaments');
    }
};
