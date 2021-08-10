<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatedMarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rated_marks', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('appraisee')->nullable();
            $table->smallInteger('supervisor')->nullable();
            $table->smallInteger('agreed')->nullable();
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
        Schema::dropIfExists('rated_marks');
    }
}
