<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerformanceAgreementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance_agreements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('opras_id')->constrained()->cascadeOnDelete();
            $table->longText('objective');
            $table->longText('target');
            $table->longText('resource');
            $table->longText('criteria');
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
        Schema::dropIfExists('performance_agreements');
    }
}
