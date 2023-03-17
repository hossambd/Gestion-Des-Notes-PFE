<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Qs;
use Illuminate\Support\Str;

class ExamTypesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('exam_types')->truncate();

        $this->createExamTypes();
    }

    protected function createExamTypes()
    {
       
                $data = [
				[
				    'name' => 'Examen Normal',
                ],
				[
					'name' => 'Examen Rattrapage',
				],
				];

            

        

        DB::table('exam_types')->insert($data);
    }
}
