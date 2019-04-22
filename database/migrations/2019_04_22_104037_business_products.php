<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BusinessProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yp_business_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned()->index();
            $table->integer('business_id')->unsigned()->index();
            $table->foreign('business_id')->references('id')->on('yp_business_users')->onDelete('cascade');
            $table->string('name')->nullable(); 
            $table->integer('category_id')->unsigned()->index();
            $table->foreign('category_id')->references('id')->on('yp_business_categories')->onDelete('cascade');
            $table->integer('sub_category_id')->unsigned()->index();
            $table->foreign('sub_category_id')->references('id')->on('yp_business_sub_categories')->onDelete('cascade');
            $table->string('price_type')->nullable(); 
            $table->string('price')->nullable(); 
            $table->string('price_from')->nullable(); 
            $table->string('price_to')->nullable(); 
            $table->string('price_per')->nullable(); 
            $table->text('product_description')->nullable();
            $table->text('product_images')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP')); 
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('yp_business_products');
    }
}
