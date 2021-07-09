<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevisedObjectivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revised_objectives', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('opras_id');
            $table->foreign('opras_id')->references('id')->on('opras')->onDelete('cascade');
            $table->longText('objective')->nullable();
            $table->longText('target')->nullable();
            $table->longText('resource')->nullable();
            $table->longText('criteria')->nullable();
            $table->longText('comments')->nullable();
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
        Schema::dropIfExists('revised_objectives');
    }
}
