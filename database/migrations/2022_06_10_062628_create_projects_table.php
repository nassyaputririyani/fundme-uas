<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id');
            $table->string('title');
            $table->string('short_description');
            $table->text('description');
            $table->string('business_proposal_url');
            $table->string('image_url');
            $table->string('goals');
            $table->integer('goal_amount');
            $table->integer('current_amount')->default(0);
            $table->date('deadline');
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
