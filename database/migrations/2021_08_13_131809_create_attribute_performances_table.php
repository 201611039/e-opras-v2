<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributePerformancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attribute_performances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('opras_id');
            $table->foreign('opras_id')->references('id')->on('opras')->onDelete('cascade');

            $table->unsignedBigInteger('team_work')->nullable()->comment = "work in team";
            $table->foreign('team_work')->references('id')->on('rated_marks')->onDelete('cascade');

            $table->unsignedBigInteger('interaction')->nullable()->comment = "get on with other staff";
            $table->foreign('interaction')->references('id')->on('rated_marks')->onDelete('cascade');

            $table->unsignedBigInteger('respect')->nullable()->comment = "gain respect from others";
            $table->foreign('respect')->references('id')->on('rated_marks')->onDelete('cascade');

            $table->unsignedBigInteger('writting')->nullable()->comment = "express in writing";
            $table->foreign('writting')->references('id')->on('rated_marks')->onDelete('cascade');

            $table->unsignedBigInteger('speak')->nullable()->comment = "express orally";
            $table->foreign('speak')->references('id')->on('rated_marks')->onDelete('cascade');

            $table->unsignedBigInteger('listen')->nullable()->comment = "listen and comprehend";
            $table->foreign('listen')->references('id')->on('rated_marks')->onDelete('cascade');

            $table->unsignedBigInteger('train')->nullable()->comment = "train and develop subordinates";
            $table->foreign('train')->references('id')->on('rated_marks')->onDelete('cascade');

            $table->unsignedBigInteger('plan_organize')->nullable()->comment = "plan and organize";
            $table->foreign('plan_organize')->references('id')->on('rated_marks')->onDelete('cascade');

            $table->unsignedBigInteger('lead')->nullable()->comment = "lead, motivate and resolve conflicts";
            $table->foreign('lead')->references('id')->on('rated_marks')->onDelete('cascade');

            $table->unsignedBigInteger('innitiate_innovate')->nullable()->comment = "initiate and innovate";
            $table->foreign('innitiate_innovate')->references('id')->on('rated_marks')->onDelete('cascade');

            $table->unsignedBigInteger('output')->nullable()->comment = "deliver accurate and high quality output timely";
            $table->foreign('output')->references('id')->on('rated_marks')->onDelete('cascade');

            $table->unsignedBigInteger('persistence')->nullable()->comment = "Ability for resilience and persistence";
            $table->foreign('persistence')->references('id')->on('rated_marks')->onDelete('cascade');

            $table->unsignedBigInteger('demand')->nullable()->comment = "meet demand";
            $table->foreign('demand')->references('id')->on('rated_marks')->onDelete('cascade');

            $table->unsignedBigInteger('extra_work')->nullable()->comment = "handle extra work";
            $table->foreign('extra_work')->references('id')->on('rated_marks')->onDelete('cascade');

            $table->unsignedBigInteger('responsibility')->nullable()->comment = "accept and fulfil responsibility";
            $table->foreign('responsibility')->references('id')->on('rated_marks')->onDelete('cascade');

            $table->unsignedBigInteger('decisions')->nullable()->comment = "make right decisions";
            $table->foreign('decisions')->references('id')->on('rated_marks')->onDelete('cascade');

            $table->unsignedBigInteger('customer')->nullable()->comment = "respond well to the customer";
            $table->foreign('customer')->references('id')->on('rated_marks')->onDelete('cascade');

            $table->unsignedBigInteger('followership')->nullable()->comment = "demonstrate follower ship skills";
            $table->foreign('followership')->references('id')->on('rated_marks')->onDelete('cascade');

            $table->unsignedBigInteger('support')->nullable()->comment = "provide ongoing support to supervisor";
            $table->foreign('support')->references('id')->on('rated_marks')->onDelete('cascade');

            $table->unsignedBigInteger('instructions')->nullable()->comment = "comply with lawful instructions of supervisors";
            $table->foreign('instructions')->references('id')->on('rated_marks')->onDelete('cascade');

            $table->unsignedBigInteger('working')->nullable()->comment = "devote working time exclusively to work related duties";
            $table->foreign('working')->references('id')->on('rated_marks')->onDelete('cascade');

            $table->unsignedBigInteger('services')->nullable()->comment = "provide quality services";
            $table->foreign('services')->references('id')->on('rated_marks')->onDelete('cascade');

            $table->unsignedBigInteger('government')->nullable()->comment = "apply knowledge abilities to benefit Government and not for personal gains";
            $table->foreign('government')->references('id')->on('rated_marks')->onDelete('cascade');

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
        Schema::dropIfExists('attribute_performances');
    }
}
