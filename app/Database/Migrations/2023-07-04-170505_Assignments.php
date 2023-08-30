<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Assignments extends Migration
{
    public function up()
    {

        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'lesson_id'           => [
                'type'           => 'INT',
                'constraint'     => 10,
            ],
            'deadline DATETIME',
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('Assignments', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('Assignments', TRUE);
    }
}
