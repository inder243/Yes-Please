<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateYpCampaignDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yp_campaign_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->integer('pay_per_click');
            $table->integer('daily_budget');
            $table->integer('status');
            $table->date('end_date');
            $table->integer('b_id');
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
        Schema::dropIfExists('yp_campaign_detail');
    }
}
