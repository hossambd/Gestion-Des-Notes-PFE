<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('password');//password
            $table->string('username')->nullable();
			$table->string('usertype')->nullable()->comment('admin','enseignant','etudiant');
			$table->string('rule')->nullable()->comment('admin','enseignant','etudiant');
            $table->string('email')->nullable();
			$table->string('email_verified_at')->nullable();            
			//etudiant information
            $table->string('nomfr')->nullable();
            $table->string('prenomfr')->nullable();
			$table->string('nomar')->nullable();
            $table->string('prenomar')->nullable();
            $table->string('cne')->nullable();
			$table->string('cin')->nullable();
            $table->date('dateN')->nullable();
			$table->string('lieuN')->nullable();          
			$table->string('sessionBac')->nullable();
			$table->string('anneeBac')->nullable();
			$table->string('adress')->nullable();
			$table->string('villeorig')->nullable();
			$table->string('pnom')->nullable();
			$table->string('pfonction')->nullable();
			$table->string('telep')->nullable();
			$table->string('mobile')->nullable();
			$table->string('filiere')->nullable();
			$table->string('image')->nullable();
			$table->string('id_no')->nullable();
			$table->string('code')->nullable(); //à ne pas toucher
            $table->timestamps();

			$table->tinyInteger('status')->default(1)->comment('0=inactive ,1=active');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
