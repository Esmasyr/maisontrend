<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('order_number')->nullable()->after('id');
            $table->string('payment_status')->default('pending')->after('payment_method');
            $table->string('shipping_name')->nullable()->after('payment_status');
            $table->string('shipping_phone')->nullable()->after('shipping_name');
            $table->string('shipping_city')->nullable()->after('shipping_address');
            $table->string('shipping_state')->nullable()->after('shipping_city');
            $table->string('shipping_zipcode')->nullable()->after('shipping_state');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'order_number', 'payment_status', 'shipping_name',
                'shipping_phone', 'shipping_city', 'shipping_state', 'shipping_zipcode'
            ]);
        });
    }
};