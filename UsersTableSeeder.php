<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Qs;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		DB::table('users')->truncate();
       // DB::table('users')->delete();

        $this->createNewUsers();
        $this->createManyStudents( 3);
    }

    protected function createNewUsers()
    {
        $password = bcrypt('12345678'); // Default user password

        $d = [

            [   'prenomfr'=> 'prenom_admin1',
				'nomfr ' => 'nom_admin1',
                'email' => 'admin1@admin.com',
                'password' => $password,
                'usertype' => 'Admin',
				'rule'     => 'admin',
                'remember_token' => Str::random(10),
            ],

            [
			'prenomfr'=> 'prenom_admin2',
			'nomfr ' => 'nom_admin2',
            'email' => 'admin2@admin.com',
            'password' => $password,
            'usertype' => 'Admin',
			'rule' => 'admin',
            'remember_token' => Str::random(10),
            ],

            ['name' => 'Enseignant 1',
                'email' => 'ens1@ens1.com',
                'usertype' => 'enseignant',
				'rule' => 'enseignant',
                'password' => $password,
                'remember_token' => Str::random(10),
            ],
			['name' => 'Enseignant 2',
                'email' => 'ens2@ens2.com',
                'usertype' => 'enseignant',
				'rule' => 'enseignant',
                'password' => $password,
                'remember_token' => Str::random(10),
            ],


        ];
        DB::table('users')->insert($d);
    }

    protected function createManyStudents(int $count)
    {
        $data = [];
		$password=bcrypt('12345678');
        for($i = 1; $i <= $count; $i++){


                $data[] = [
				    'name' => 'nom_etud'.$i,
					'prenomfr'=> 'prenom_etud'.$i,
					'nomfr ' => 'nom_etud'.$i,
                    'email' => 'etudiant'.$i.'@etudiant'.$i.'.com',
                    'prenomar'=> 'اسم'.$i,
					'nomar ' => 'لقب'.$i,
					'usertype' => 'Student',
					'rule' => 'etudiant',
                    'password' => $password,
                    'remember_token' => Str::random(10),
                ];

            

        }

        DB::table('users')->insert($data);
    }
}
