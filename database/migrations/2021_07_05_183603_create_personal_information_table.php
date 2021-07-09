<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_information', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supervisor_id')->nullable()->comment('supervisor of the user')->constrained('users')->cascadeOnDelete();
            $table->foreignId('directorate_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('station_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('opras_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('post_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('academic_qualification')->nullable();
            $table->string('substantive_post')->nullable();
            $table->date('first_appointment_present_post')->nullable();
            $table->string('salary_scale')->nullable();
            $table->integer('period')->nullable();
            $table->string('term_of_service')->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('personal_information');
    }
}
