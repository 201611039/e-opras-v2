<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnualReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annual_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('opras_id');
            $table->foreign('opras_id')->references('id')->on('opras')->onDelete('cascade');

            $table->unsignedBigInteger('mid_year_review_id')->nullable();
            $table->foreign('mid_year_review_id')->references('id')->on('mid_year_reviews')->onDelete('cascade');

            $table->unsignedBigInteger('revised_objective_id')->nullable();
            $table->foreign('revised_objective_id')->references('id')->on('revised_objectives')->onDelete('cascade');

            $table->longText('objective');
            $table->longText('progress_made')->nullable();
            $table->text('comment')->nullable();

            $table->unsignedBigInteger('rated_mark_id')->nullable();
            $table->foreign('rated_mark_id')->references('id')->on('rated_marks')->onDelete('cascade');
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
        Schema::dropIfExists('annual_reviews');
    }
}
