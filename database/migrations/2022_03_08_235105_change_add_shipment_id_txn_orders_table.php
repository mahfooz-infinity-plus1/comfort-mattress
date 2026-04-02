<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeAddShipmentIdTxnOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('txn_orders', function (Blueprint $table) {
            $table->string('shipment_id')->nullable()->after('id');
            $table->string('shipment_order_id')->nullable()->after('shipment_id');
            $table->text('pickup_point')->nullable()->after('shipment_order_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('txn_orders', function (Blueprint $table) {
            //
        });
    }
}
