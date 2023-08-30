<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TeachingSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'teacher_id'  => 'D_2',
                'subj_code'  => 'MK027',
            ],
            [
                'teacher_id'  => 'D_2',
                'subj_code'  => 'MK028',
            ],
            [
                'teacher_id'  => 'D_3',
                'subj_code'  => 'MK030',
            ],
            [
                'teacher_id'  => 'D_4',
                'subj_code'  => 'MK029',
            ],
            [
                'teacher_id'  => 'D_5',
                'subj_code'  => 'MK026',
            ],
            [
                'teacher_id'  => 'D_6',
                'subj_code'  => 'MK025',
            ],
            [
                'teacher_id'  => 'D_6',
                'subj_code'  => 'MK031',
            ],
            [
                'teacher_id'  => 'D_7',
                'subj_code'  => 'MK032',
            ],

        ];

        $this->db->table('RTeaching')->insertBatch($data);
    }
}
