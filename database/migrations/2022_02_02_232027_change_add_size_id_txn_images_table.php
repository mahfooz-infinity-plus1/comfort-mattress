<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeAddSizeIdTxnImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('txn_images', function (Blueprint $table) {
            $table->unsignedBigInteger('size_id')->nullable()->after('color_id');
            $table->foreign('size_id')->references('id')->on('mst_sizes')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('txn_images', function (Blueprint $table) {
            //
        });
    }
}
