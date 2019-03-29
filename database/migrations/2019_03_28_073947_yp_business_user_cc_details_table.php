<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class YpBusinessUserCcDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yp_business_user_cc_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('b_id')->unsigned()->index();
            $table->foreign('b_id')->references('id')->on('yp_business_users')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('customer_id');
            $table->integer('wallet_amount');
            $table->integer('lastdigit');
            $table->string('expire_month',20);
            $table->string('expire_year',20);
            $table->date('card_added_on');
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
        //
    }
}
