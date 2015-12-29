<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;

    /**
     * Class CreateQuestionsTable.
     */
    class CreateQuestionsTable extends Migration
    {
        public function up()
        {
            Schema::create('questions', function (Blueprint $table) {
                $table->increments('id');
                $table->morphs('questionable');
                $table->morphs('author');
                $table->string('title');
                $table->text('body');
                $table->boolean('is_answered')->default(false);
                $table->integer('best_answer_id')->unsigned()->nullable();
                $table->timestamps();
            });
        }

        public function down()
        {
            Schema::dropIfExists('questions');
        }
    }
