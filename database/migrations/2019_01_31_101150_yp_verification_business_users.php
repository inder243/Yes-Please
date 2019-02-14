<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class YpVerificationBusinessUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yp_verfication_business_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('b_id')->unsigned()->index();
            $table->foreign('b_id')->references('id')->on('yp_business_users')->onDelete('cascade');
            $table->string('business_user_id')->nullable();
            $table->text('uploaded_files')->nullable();
            $table->string('business_id')->nullable();
            $table->string('admin_verified_status')->nullable();
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
        Schema::dropIfExists('yp_verfication_business_users');
    }
}
