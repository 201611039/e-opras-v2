<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOverallPerformancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('overall_performances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('opras_id')->constrained()->cascadeOnDelete();
            $table->longText('appraisee_comments')->nullable();
            $table->longText('supervisor_comments')->nullable();
            $table->longText('observer_comments')->nullable();
            $table->float('overall_marks')->nullable();
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
        Schema::dropIfExists('overall_performances');
    }
}
