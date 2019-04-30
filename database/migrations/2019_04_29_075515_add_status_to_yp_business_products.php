<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusToYpBusinessProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('yp_business_products', function (Blueprint $table) {
            $table->tinyInteger('status')->after('product_images')->default(1)->comment('0=>stop_promote');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('yp_business_products', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}
