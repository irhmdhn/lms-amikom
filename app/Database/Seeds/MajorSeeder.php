<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MajorSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'code'  => '01',
                'code_name'  => 'D3TI',
                'maj_name'  => 'Teknik Informatika',
            ],
            [
                'code'  => '02',
                'code_name'  => 'D3MI',
                'maj_name'  => 'Manajemen Informatika',
            ],
            [
                'code'  => '11',
                'code_name'  => 'S1IF',
                'maj_name'  => 'Informatika',
            ],
            [
                'code'  => '12',
                'code_name'  => 'S1SI',
                'maj_name'  => 'Sistem Informasi',
            ],
            [
                'code'  => '82',
                'code_name'  => 'S1TI',
                'maj_name'  => 'Teknologi Informasi',
            ],
            [
                'code'  => '83',
                'code_name'  => 'S1TK',
                'maj_name'  => 'Teknik Komputer',
            ],
        ];

        $this->db->table('Majors')->insertBatch($data);
    }
}
