<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class YpBusinessUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yp_business_users', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('business_userid');
            $table->string('business_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('full_address')->nullable();
            $table->string('logitude')->nullable();
            $table->string('latitude')->nullable();
            $table->text('image_name')->nullable();
            $table->string('remember_token')->nullable();
            $table->string('completed_steps')->nullable();
            $table->tinyInteger('admin_approve')->default(0);
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
        Schema::dropIfExists('yp_business_users');
    }
}
