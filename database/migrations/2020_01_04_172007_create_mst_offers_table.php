<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMstOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mst_offers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('code')->unique();                    
            $table->enum('type', ['flat', 'percent']);            
            $table->decimal('value', 10, 2);                      
            $table->decimal('min_order_amount', 10, 2)->nullable(); 
            $table->unsignedInteger('max_uses')->nullable();      
            $table->unsignedInteger('uses_per_user')->nullable(); 
            $table->dateTime('start_date')->nullable();           
            $table->dateTime('end_date')->nullable();             
            $table->boolean('is_active')->default(true); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mst_offers');
    }
}
