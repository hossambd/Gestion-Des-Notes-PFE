<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Qs;
use Illuminate\Support\Str;

class SemestresTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('semestres')->truncate();
       // DB::table('semestres')->delete();

        $this->createManyStudentsYears(10);
    }

    protected function createManyStudentsYears(int $count)
    {
        $data = [];
        for($i = 1; $i <= $count; $i++){
                $data[] = [
				    'name' => 'S'.$i,
                ];

            

        }

        DB::table('semestres')->insert($data);
    }
}
