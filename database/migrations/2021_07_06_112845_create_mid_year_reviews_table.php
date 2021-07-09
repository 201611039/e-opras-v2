<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMidYearReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mid_year_reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('opras_id');
            $table->foreign('opras_id')->references('id')->on('opras')->onDelete('cascade');
            $table->unsignedBigInteger('performance_agreement_id');
            $table->foreign('performance_agreement_id')->references('id')->on('performance_agreements')->onDelete('cascade');
            $table->longText('objective')->nullable();
            $table->longText('progress_made')->nullable();
            $table->longText('factor_affecting_performance')->nullable();
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
        Schema::dropIfExists('mid_year_reviews');
    }
}
