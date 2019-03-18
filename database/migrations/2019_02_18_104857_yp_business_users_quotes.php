<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class YpBusinessUsersQuotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yp_business_users_quotes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('business_id')->unsigned()->index();
            $table->foreign('business_id')->references('id')->on('yp_business_users')->onDelete('cascade');
            $table->integer('general_id')->unsigned()->index();
            $table->foreign('general_id')->references('id')->on('yp_general_users')->onDelete('cascade');
            $table->integer('quote_id')->unsigned()->index();
            $table->foreign('quote_id')->references('id')->on('yp_general_users_quotes')->onDelete('cascade');
            $table->tinyInteger('status')->default(1)->comment('0=>cancelled, 1=>new, 2=>Read, 3=>Quoted, 4=>Accepted, 5=>Rejected/Ignored,6=>Completed');;
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
        Schema::dropIfExists('yp_business_users_quotes');
    }
}
