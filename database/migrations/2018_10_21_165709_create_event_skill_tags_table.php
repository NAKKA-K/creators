<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventSkillTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_skill_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->unsingedInteger('event_id');
            $table->unsingedInteger('skill_tag_id');
            $table->timestamps();

            $table->foreign('event_id')
                ->references('id')->on('events')
                ->onDelete('cascade');
            $table->foreign('skill_tag_id')
                ->references('id')->on('skill_tags')
                ->onDelete('cascade');

            $table->unique(['event_id', 'skill_tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_skill_tags');
    }
}
