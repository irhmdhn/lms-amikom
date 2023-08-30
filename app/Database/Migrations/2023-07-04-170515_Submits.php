<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Submits extends Migration
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
            'user_id' => [
                'type'           => 'VARCHAR',
                'constraint'     => 10,
            ],
            'assignment_id'          => [
                'type'           => 'INT',
                'constraint'     => 10,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('Submits', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('Submits', TRUE);
    }
}
