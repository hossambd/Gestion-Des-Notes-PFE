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
       $this->createManyStudents(3);
    }

    protected function createNewUsers()
    {
        $password = bcrypt('12345678'); // Default user password

        $d = [

            [   'password' => $password,
			    'usertype' => 'admin',
				'rule'     => 'admin',
				'email'    => 'admin1@admin.com',
				'nomfr'    => 'nom_admin1',
                'remember_token' => Str::random(10),
            ],

            [
				'password' => $password,
			    'usertype' => 'admin',
				'rule'     => 'admin',
				'email' => 'admin2@admin.com',
				'nomfr' => 'nom_admin2',
            'remember_token' => Str::random(10),
            ],

            [   'password' => $password,
				'usertype' => 'enseignant',
				'rule' => 'enseignant',
				'email' => 'ens1@ens1.com',
				'nomfr' => 'Enseignant 1',
                'remember_token' => Str::random(10),
            ],
			[	'password' => $password,
				'usertype' => 'enseignant',
				'rule' => 'enseignant',
				'email' => 'ens2@ens2.com',
				'nomfr' => 'Enseignant 2',
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
				    'nomfr' => 'nom_etudiant '.$i,
					'prenomfr'=> 'prenom_etud '.$i,
                    'email' => 'etudiant'.$i.'@etudiant'.$i.'.com',
                    'prenomar'=> $i.' اسم',
					'nomar' => $i.' لقب',
					'usertype' => 'Student',
					'rule' => 'etudiant',
                    'password' => $password,
                    'remember_token' => Str::random(10),
                ];

            

        }

        DB::table('users')->insert($data);
    }
}
