<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Qs;
use Illuminate\Support\Str;

class GroupesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('groupes')->truncate();
       // DB::table('semestres')->delete();

        $this->createManyStudentsYears(4);
    }

    protected function createManyStudentsYears(int $count)
    {
        $data = [];
        for($i = 1; $i <= $count; $i++){
                $data[] = [
				    'name' => 'Groupe '.$i,
                ];

            

        }

        DB::table('groupes')->insert($data);
    }
}
