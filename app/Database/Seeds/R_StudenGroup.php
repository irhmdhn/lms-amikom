<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class R_StudenGroup extends Seeder
{
    public function run()
    {
        $tahun = [20, 21, 22, 23];
        $prodi = ['01', '02', '11', '12', '82', '83'];
        foreach ($tahun as $t) {
            foreach ($prodi as $p) {
                $code = $t . $p;
                $data = [
                    'code' => $code,
                    'major_id' => $p,
                ];
                $this->db->table('StudentGroups')->insert($data);
            }
        }
    }
}
