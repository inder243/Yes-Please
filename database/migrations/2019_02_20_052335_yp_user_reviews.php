<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class YpUserReviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yp_user_reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('business_id')->unsigned()->index();
            $table->foreign('business_id')->references('id')->on('yp_business_users')->onDelete('cascade');
            $table->integer('general_id')->unsigned()->index();
            $table->foreign('general_id')->references('id')->on('yp_general_users')->onDelete('cascade');
            $table->integer('quote_id')->unsigned()->index();
            //$table->foreign('quote_id')->references('id')->on('yp_general_quotes')->onDelete('cascade');
            $table->string('review')->nullable();
            $table->integer('rating')->nullable();
            $table->string('user_type')->nullable()->comment('Review by which user type');
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
        Schema::dropIfExists('yp_user_reviews');
    }
}
