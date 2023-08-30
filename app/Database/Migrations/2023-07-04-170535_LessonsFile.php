<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class LessonsFile extends Migration
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
            'file' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'unique'         => TRUE,
            ],
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('LessonsFile', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('LessonsFile', TRUE);
    }
}