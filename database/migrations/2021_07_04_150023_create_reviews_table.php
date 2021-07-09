<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('opras_id')->nullable()->constrained()->cascadeOnDelete();
            $table->enum('section', [
                'personal_information',
                'performance_agreement',
                'mid_year_review',
                'revised_objective',
                'annual_performance_review',
                'attribute_good_performance',
                'overall_performance',
                'reward_measure_sanction',
            ]);
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
        Schema::dropIfExists('reviews');
    }
}
