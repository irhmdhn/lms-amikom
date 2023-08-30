<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class SubjectSeeder extends Seeder
{

    public function run()
    {
        $nama = [
            'pendidikan pancasila', 'pendidikan agama', 'bahasa inggris i', 'sistem operasi', 'logika informatika', 'pengantar it & instalasi komputer ', 'ekonomi kreatif', 'fotografi', 'kewirausahaan',
            'lingkungan bisnis', 'bahasa inggris ii', 'algoritma dan pemrograman', 'pendidikan kewarganegaraan', 'jaringan komputer 1', 'perancangan web 1', 'desain grafis',
            'pengolahan basis data', 'metodologi penelitian', 'multimedia', 'bahasa indonesia', 'success skill', 'e-commerce', 'struktur data', 'perancangan web 2',
            'user interface/user experience', 'hybrid web development', 'pemrograman web lanjut', 'pemasaran digital', 'keamanan web', 'development framework', 'bisnis digital', 'manajemen proyek it',
        ];
        $prefix = 'MK'; // Prefix for the auto-incrementing string value
        $startValue = 1; // Starting numeric value for the auto-incrementing part

        for ($i = 0; $i < count($nama); $i++) {
            $autoIncrementValue = $prefix . str_pad($startValue, 3, '0', STR_PAD_LEFT);
            $data = [
                'code'  => $autoIncrementValue,
                'subj_name'  => $nama[$i],
                'created_at'  => Time::now(),
                'updated_at'  => Time::now(),
            ];
            $this->db->table('subjects')->insert($data);
            $startValue++;
        }
        // for ($i = 0; $i < count($nama); $i++) {
        //     $data = [
        // $nama[$i]
        //     ];
        //     $this->db->table('matkuls')->insert($data);
        // }
    }
}
