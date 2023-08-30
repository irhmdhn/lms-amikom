<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RunSeeder extends Seeder
{
    public function run()
    {
        $this->call('MajorSeeder');
        $this->call('UserSeeder');
        $this->call('SubjectSeeder');
        $this->call('R_StudenGroup');
        $this->call('TeachingSeeder');
        $this->call('ClassSeeder');
    }
}
