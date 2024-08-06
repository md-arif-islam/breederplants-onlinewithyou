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
        Schema::create('variety_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('grower_id')->nullable();
            $table->integer('breeder_id')->nullable();
            $table->string('variety_name');
            $table->bigInteger('amount_of_plants');
            $table->string('pot_size')->nullable();
            $table->boolean('pot_trial')->default(false);
            $table->boolean('open_field_trial')->default(false);
            $table->date('date_of_propagation')->nullable();
            $table->date('date_of_potting')->nullable();
            $table->json('samples_schedule')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variety_reports');
    }
};
