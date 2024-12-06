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
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('payment_method'); // e.g., 'stripe', 'paypal'
            $table->string('transaction_id')->nullable(); // Transaction ID from gateway
            $table->decimal('amount', 8, 2); // Amount in decimal
            $table->string('currency')->default('usd'); // Currency code
            $table->text('description')->nullable(); // Optional description
            $table->timestamp('paid_at')->nullable(); // Payment timestamp
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
