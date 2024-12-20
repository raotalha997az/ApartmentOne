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
        Schema::create('screenings', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('property_city')->nullable();
            $table->string('property_location')->nullable();
            $table->date('shifting_date')->nullable();
            $table->integer('rent_type')->nullable();
            $table->integer('cat_id')->nullable();
            $table->boolean('pet')->default(false);
            $table->boolean('smoke')->default(false);
            $table->boolean('waterbed')->default(false);
            $table->boolean('lease_short_term')->nullable(false);
            $table->boolean('security_deposit')->default(false);
            $table->double('deposit_amount')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('screenings');
    }
};
