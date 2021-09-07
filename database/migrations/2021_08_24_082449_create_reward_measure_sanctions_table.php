<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRewardMeasureSanctionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reward_measure_sanctions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('opras_id')->constrained()->cascadeOnDelete();
            $table->longText('description');
            $table->enum('category', [
                'reward', 'measure', 'sanction'
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
        Schema::dropIfExists('reward_measure_sanctions');
    }
}
