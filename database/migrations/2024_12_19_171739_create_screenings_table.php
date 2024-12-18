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
            $table->string('property_city');
            $table->string('property_location');
            $table->date('shifting_date');
            $table->integer('rent_type');
            $table->integer('cat_id');
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
