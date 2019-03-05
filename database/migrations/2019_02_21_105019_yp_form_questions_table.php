<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class YpFormQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yp_form_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('formid',100);
            $table->string('qid',150);
            $table->string('type',50);
            $table->tinyInteger('required');
            $table->text('options')->nullable();
            $table->string('title',200);
            $table->string('placeholder',200)->nullable();
            $table->text('description')->nullable();
            $table->integer('min')->nullable();
            $table->integer('max')->nullable();
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
        Schema::dropIfExists('yp_form_questions');
    }
}
