<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class YpBusinessUserEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('yp_business_user_events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->date('from_date');
            $table->date('to_date');
            $table->time('from_time');
            $table->time('to_time');
            $table->integer('type');
            $table->integer('status');
            $table->integer('b_id')->unsigned()->index();
            $table->foreign('b_id')->references('id')->on('yp_business_users')->onDelete('cascade');
            $table->integer('g_id')->unsigned()->index();
            $table->foreign('g_id')->references('id')->on('yp_general_users')->onDelete('cascade');
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
