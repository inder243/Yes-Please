<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class YpGeneralUsersQuotes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yp_general_users_quotes', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('quote_id');
            $table->integer('general_id')->unsigned()->index();
            $table->foreign('general_id')->references('id')->on('yp_general_users')->onDelete('cascade');
            $table->string('filter_data')->nullable();
            $table->text('dynamic_formdata')->nullable();
            $table->string('quote_count')->nullable();
            $table->string('work_description')->nullable();
            $table->text('uploaded_files')->nullable();
            $table->string('phone_number')->nullable();
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
        Schema::dropIfExists('yp_general_users_quotes');
    }
}
