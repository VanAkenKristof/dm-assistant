<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->increments('id');

            $table->text('name');
            $table->text('player_name');
            $table->integer('level');
            $table->text('class');
            $table->text('race');
            $table->text('background');
            $table->text('alignment');
            $table->integer('experience');

            $table->integer('strength');
            $table->integer('dexterity');
            $table->integer('constitution');
            $table->integer('wisdom');
            $table->integer('intelligence');
            $table->integer('charisma');

            $table->boolean('strength_prof');
            $table->boolean('dexterity_prof');
            $table->boolean('constitution_prof');
            $table->boolean('wisdom_prof');
            $table->boolean('intelligence_prof');
            $table->boolean('charisma_prof');

            $table->text('acrobatics');
            $table->text('animal_handling');
            $table->text('arcana');
            $table->text('athletics');
            $table->text('deception');
            $table->text('history');
            $table->text('insight');
            $table->text('intimidation');
            $table->text('investigation');
            $table->text('medicine');
            $table->text('nature');
            $table->text('perception');
            $table->text('performance');
            $table->text('persuasion');
            $table->text('religion');
            $table->text('sleight_of_hand');
            $table->text('stealth');
            $table->text('survival');

            $table->integer('ac')->default(10);
            $table->integer('initiative')->default(0);
            $table->integer('speed')->default(30);

            $table->integer('max_hp');
            $table->integer('current_hp');
            $table->integer('temp_hp');

            $table->text('personality');
            $table->text('ideals');
            $table->text('bonds');
            $table->text('flaws');

            $table->text('features');
            $table->text('other');

            $table->integer('cp');
            $table->integer('sp');
            $table->integer('ep');
            $table->integer('gp');
            $table->integer('pp');

            $table->text('equipment');

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
        Schema::dropIfExists('characters');
    }
}
