<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_elements', function (Blueprint $table) {
            $table->id();
			$table->string('name');
			$table->integer('semestre_id');
            $table->integer('module_id');
           $table->integer('element_id');
            $table->double('full_mark');
            $table->double('pass_mark');
			$table->double('subjective_mark');
			$table->integer('coef_mark');        
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
        Schema::dropIfExists('assign_elements');
    }
}
