<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class YpBusinessUsersQuotesReply extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yp_business_user_quotes_reply', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('business_id')->unsigned()->index();
            $table->foreign('business_id')->references('id')->on('yp_business_users')->onDelete('cascade');
            $table->integer('quote_id')->unsigned()->index();
            $table->foreign('quote_id')->references('id')->on('yp_general_users_quotes')->onDelete('cascade');
            $table->string('price_quotes')->nullable();
            $table->string('price_type')->nullable();
            $table->string('templates')->nullable();
            $table->string('details')->nullable();
            $table->text('uploaded_files')->nullable();
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
        Schema::dropIfExists('yp_business_user_quotes_reply');
    }
}
