<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class UserSeeder extends Seeder
{
    public function group()
    {
        $tahun = [20, 21, 22, 23];
        $prodi = ['01', '02', '11', '12', '82', '83'];
        $newArr = [];
        foreach ($tahun as $t) {
            foreach ($prodi as $p) {
                array_push($newArr, $t . $p);
            }
        }
        return $newArr;
    }
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');
        $password = password_hash('password', PASSWORD_DEFAULT);
        $jumlah = 300;
        $start = 2;

        $admins = [
            'id' => 'A_1',
            'name' => 'ADMINISTRATOR',
        ];
        $teachers = [
            [
                'id' => 'D_1',
                'nik' => 190302001,
                'name' => 'Dosen',
            ],
            [
                'id' => 'D_2',
                'nik' => 190302002,
                'name' => 'Toto Indriyatmoko, M.Kom',
            ],
            [
                'id' => 'D_3',
                'nik' => 190302003,
                'name' => 'Hastari Utama, M.Cs',
            ],
            [
                'id' => 'D_4',
                'nik' => 190302004,
                'name' => 'Pramudhita Ferdiansyah, M.Kom',
            ],
            [
                'id' => 'D_5',
                'nik' => 190302005,
                'name' => 'Aditya Rizki Yudiantika, ST, M.Eng',
            ],
            [
                'id' => 'D_6',
                'nik' => 190302006,
                'name' => 'Arvin Claudy Frobenius, M.Kom',
            ],
            [
                'id' => 'D_7',
                'nik' => 190302007,
                'name' => 'Nila Feby Puspitasari, S.Kom, M.Cs',
            ],

        ];
        $student = [
            'id' => 'M_1',
            'nim' => 21010001,
            'name' => 'Mahasiswa',
            'major' => '01',
            'group' => '2101',
        ];
        $this->db->table('students')->insert($student);


        for ($i = $start; $i <= $jumlah; $i++) {
            $id = 'M_' . $i;
            $group = $faker->randomElement($this->group());
            $nimMhs = $group . str_pad($start, 4, '0', STR_PAD_LEFT);
            $major = substr($group, 2);
            $nama = $faker->name();
            $email = str_replace(' ', '', strtolower($nama)) . '@students.amikom.ac.id';

            $students = [
                'id' => $id,
                'nim' => $nimMhs,
                'name' => $nama,
                'group' => $group,
                'major' => $major,
            ];
            $this->db->table('students')->insert($students);

            $users = [
                'user_id'       => $id,
                'email'         => $email,
                'password'      => $password,
                'role'          => 'mahasiswa',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
            ];
            $this->db->table('users')->insert($users);
            $start++;
        }

        $users = [
            [
                'user_id'       => 'A_1',
                'email'         => 'admin@amikom.ac.id',
                'password'      => $password,
                'role'          => 'admin',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
            ],
            [
                'user_id'       => 'D_1',
                'email'         => 'dosen@amikom.ac.id',
                'password'      => $password,
                'role'          => 'dosen',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
            ],
            [
                'user_id'       => 'D_2',
                'email'         => 'toto@amikom.ac.id',
                'password'      => $password,
                'role'          => 'dosen',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
            ],
            [
                'user_id'       => 'D_3',
                'email'         => 'hastari@amikom.ac.id',
                'password'      => $password,
                'role'          => 'dosen',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
            ],
            [
                'user_id'       => 'D_4',
                'email'         => 'pramudhita@amikom.ac.id',
                'password'      => $password,
                'role'          => 'dosen',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
            ],
            [
                'user_id'       => 'D_5',
                'email'         => 'aditya@amikom.ac.id',
                'password'      => $password,
                'role'          => 'dosen',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
            ],
            [
                'user_id'       => 'D_6',
                'email'         => 'arvin@amikom.ac.id',
                'password'      => $password,
                'role'          => 'dosen',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
            ],
            [
                'user_id'       => 'D_7',
                'email'         => 'nila@amikom.ac.id',
                'password'      => $password,
                'role'          => 'dosen',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
            ],
            [
                'user_id'       => 'M_1',
                'email'         => 'mahasiswa@students.amikom.ac.id',
                'password'      => $password,
                'role'          => 'mahasiswa',
                'created_at'    => Time::now(),
                'updated_at'    => Time::now(),
            ],
        ];
        $this->db->table('admins')->insert($admins);
        $this->db->table('teachers')->insertBatch($teachers);
        $this->db->table('users')->insertBatch($users);
    }
}
