<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class YpBusinessDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yp_business_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('b_id')->unsigned()->index();
            $table->foreign('b_id')->references('id')->on('yp_business_users')->onDelete('cascade');
            $table->bigInteger('business_userid');
            $table->string('website_url')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('schedule')->nullable();
            $table->string('geographic')->nullable();
            $table->text('business_profile')->nullable();
            $table->text('pic_vid')->nullable();
            $table->string('hash_tags')->nullable();
            $table->string('review_count')->nullable();
            $table->string('rating')->nullable();
            $table->string('category')->nullable();
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
        Schema::dropIfExists('yp_business_details');
    }
}
