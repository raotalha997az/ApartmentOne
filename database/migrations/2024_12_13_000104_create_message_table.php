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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conversation_id')->constrained('applypropertyhistory')->onDelete('cascade'); // The sender of the message
            $table->foreignId('sender_id')->constrained('users')->onDelete('cascade'); // The sender of the message
            $table->foreignId('receiver_id')->constrained('users')->onDelete('cascade'); // The receiver of the message
            $table->foreignId('property_id')->constrained('properties')->onDelete('cascade');
            $table->text('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('message');
    }
};