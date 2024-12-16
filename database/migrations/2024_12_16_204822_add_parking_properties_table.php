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
            $table->boolean('parking')->default(0)->after('contact_email');
            $table->boolean('credit_check')->default(0)->after('parking');
            $table->string('kind_of_parking')->nullable()->after('credit_check');
            $table->integer('no_of_vehicle')->after('kind_of_parking');
            $table->boolean('waterbed')->default(0)->after('no_of_vehicle');
            $table->boolean('availability_check')->default(0)->after('waterbed');
            $table->date('date_availability')->nullable()->after('availability_check');
            $table->boolean('lease_check')->default(0)->after('date_availability');
            $table->integer('lease_type')->nullable()->after('lease_check');
            $table->integer('lease_period')->nullable()->after('lease_type');
            $table->integer('rent_type')->nullable()->after('lease_period');
            $table->integer('payment_frequency')->nullable()->after('rent_type');
            $table->boolean('security_deposit')->default(0)->after('payment_frequency');
            $table->decimal('deposit_amount')->nullable()->after('security_deposit');
            $table->boolean('conviction')->default(0)->after('deposit_amount');
            $table->text('conviction_pecify')->nullable()->after('conviction');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn([
                'parking',
                'credit_check',
                'kind_of_parking',
                'no_of_vehicle',
                'waterbed',
                'availability_check',
                'date_availability',
                'lease_check',
                'lease_type',
                'lease_period',
                'rent_type',
                'payment_frequency',
                'security_deposit',
                'deposit_amount',
                'conviction',
                'conviction_pecify',
            ]);
        });
    }
};
