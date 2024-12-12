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
        Schema::table('properties', function (Blueprint $table) {
            $table->string('country')->nullable()->after('price_rent');
            $table->boolean('smoking')->default(false)->after('country');
            $table->boolean('credit_history_check')->default(false)->after('smoking');
            $table->boolean('bankruptcy')->default(false)->after('credit_history_check');
            $table->integer('many_time_evicted')->nullable()->after('bankruptcy');
            $table->string('when_evicted')->nullable()->after('many_time_evicted');
            $table->string('contact_name')->nullable()->after('when_evicted');
            $table->string('contact_phone_number')->nullable()->after('contact_name');
            $table->string('contact_email')->nullable()->after('contact_phone_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn([
                'country',
                'smoking',
                'credit_history_check',
                'bankruptcy',
                'many_time_evicted',
                'when_evicted',
                'contact_name',
                'contact_phone_number',
                'contact_email'
            ]);
        });
    }
};
