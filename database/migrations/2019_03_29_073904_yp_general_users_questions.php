<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class YpGeneralUsersQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yp_general_users_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('question_id')->unsigned()->index();
            $table->integer('general_id')->unsigned()->index();
            $table->foreign('general_id')->references('id')->on('yp_general_users')->onDelete('cascade');
            $table->string('q_title')->nullable();
            $table->text('q_description')->nullable();
            $table->integer('cat_id')->unsigned()->index();
            $table->foreign('cat_id')->references('id')->on('yp_business_categories')->onDelete('cascade');
            $table->text('cat_name')->nullable();
            $table->text('uploaded_files')->nullable();
            $table->string('phone_number')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1=>new, 2=>Read, 3=>Answered');
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
        Schema::dropIfExists('yp_general_users_questions');
    }
}
