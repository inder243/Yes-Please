<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class YpBusinessUsersQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('yp_business_users_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('business_id')->unsigned()->index();
            $table->foreign('business_id')->references('id')->on('yp_business_users')->onDelete('cascade');
            $table->integer('general_id')->unsigned()->index();
            $table->foreign('general_id')->references('id')->on('yp_general_users')->onDelete('cascade');
            $table->integer('question_id')->unsigned()->index();
            $table->foreign('question_id')->references('id')->on('yp_general_users_questions')->onDelete('cascade');
            $table->text('business_answer')->nullable();
            $table->tinyInteger('status_bus')->default(1)->comment('1=>new, 2=>Read, 3=>Answered');
            $table->tinyInteger('mark_answered')->default(0)->comment('1=>mark as answered');
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
        Schema::dropIfExists('yp_business_users_questions');
    }
}
