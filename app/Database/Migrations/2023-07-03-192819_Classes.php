<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Classes extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'class_id'          => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'std_group'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 4,
            ],
            'teaching_id'          => [
                'type'           => 'INT',
                'constraint'     => 4,
            ],
        ]);
        $this->forge->addKey('class_id', TRUE);
        $this->forge->createTable('classes', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('classes', TRUE);
    }
}
