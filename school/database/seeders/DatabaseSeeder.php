<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
		   $this->call(UsersTableSeeder::class);
			$this->call(SemestresTableSeeder::class);
			$this->call(ModulesTableSeeder::class);
			$this->call(AnneesTableSeeder::class);
			$this->call(GroupesTableSeeder::class);
			$this->call(ExamTypesTableSeeder::class);
		  
        // \App\Models\User::factory(10)->create();
    }
}
