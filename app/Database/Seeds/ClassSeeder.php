<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ClassSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'std_group'  => '2101',
                'teaching_id'  => '1',
            ],
            [
                'std_group'  => '2101',
                'teaching_id'  => '2',
            ],
            [
                'std_group'  => '2101',
                'teaching_id'  => '3',
            ],
            [
                'std_group'  => '2101',
                'teaching_id'  => '4',
            ],
        ];
        $this->db->table('classes')->insertBatch($data);
    }
}
