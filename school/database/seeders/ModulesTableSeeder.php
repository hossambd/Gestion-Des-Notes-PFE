<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Qs;
use Illuminate\Support\Str;

class ModulesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('modules')->truncate();
       // DB::table('modules')->delete();

        $this->createManyStudentsClasses(5);
    }

    protected function createManyStudentsClasses(int $count)
    {
        $data = [];
        for($i = 1; $i <= $count; $i++){
                $data[] = [
				    'name' => 'UEL '.$i,
                ];

            

        }

        DB::table('modules')->insert($data);
    }
}
