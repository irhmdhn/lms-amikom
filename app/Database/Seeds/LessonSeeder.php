<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class LessonSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title'  => 'Lorem ipsum.',
                'description'  => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique, est nisi quis maxime expedita facere voluptatem inventore eius doloribus nostrum odit ex eum dicta corporis ipsam at. Illo totam, modi, alias optio quo fugit, odit temporibus fugiat rem accusamus perferendis doloremque quibusdam natus? Accusantium quam, voluptatibus doloribus sequi laborum corporis.',
                'class_id' => 1,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
            [
                'title'  => 'Lorem ipsum dolor sit amet.',
                'description'  => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloribus necessitatibus alias ab odio laboriosam. Fugit illum sapiente, ratione quia provident nihil qui non, ipsam ex esse officia, perferendis quibusdam eius.',
                'class_id' => 1,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ],
        ];
        $this->db->table('lessons')->insertBatch($data);
    }
}
