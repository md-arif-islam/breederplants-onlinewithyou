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
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('thumbnail');
            $table->string('variety');
            $table->string('breeder_id');
            $table->string('grower_id');
            $table->bigInteger('amount_of_plants');
            $table->bigInteger('amount_of_samples');
            $table->date('next_sample_date')->nullable();
            $table->string('pot_size')->nullable();
            $table->boolean('pot_trial')->default(false);
            $table->string('trial_location')->nullable();
            $table->boolean('open_field_trial')->default(false);
            $table->date('date_of_propagation')->nullable();
            $table->date('date_of_potting')->nullable();
            $table->boolean('cut_back')->default(false);
            $table->bigInteger('removed_flowers')->nullable();
            $table->boolean('caned')->default(false);
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
