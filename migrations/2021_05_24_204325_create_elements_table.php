<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elements', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->integer('COEF');
            $table->tinyInteger('OBLIGE')->default(0)->comment('0=inactive ,1=active');
            $table->tinyInteger('ROGROP')->default(0)->comment('0=inactive ,1=active');
            $table->foreignId(column: 'user_id')->constrained();
            $table->foreignId(column: 'module_id')->constrained();
            $table->foreignId(column: 'groupe_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elements');
    }
}
