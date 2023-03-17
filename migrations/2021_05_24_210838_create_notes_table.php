<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->foreignId(column: 'user_id')->constrained();
            $table->foreignId(column: 'element_id')->constrained();
            $table->integer('NOTE_N');
            $table->integer('NOTE_R');
            $table->tinyInteger('ETAT');
            $table->string('ANNEE_SCOLAIRE');

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
        Schema::dropIfExists('notes');
    }
}
