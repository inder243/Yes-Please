<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class YpBusinessUserTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('yp_business_user_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('trans_id');
            $table->text('response');
            $table->integer('b_id')->unsigned()->index();
            $table->foreign('b_id')->references('id')->on('yp_business_users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('cat_id')->unsigned()->index();
            $table->date('transaction_made_on');
            $table->integer('type');
            $table->integer('amonut');
            $table->integer('status');
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
