<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Lessons extends Migration
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
            'title'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'description'        => [
                'type'           => 'TEXT',
            ],
            'file_id'          => [
                'type'           => 'INT',
                'constraint'     => 10,
                'null'           => TRUE,
            ],
            'class_id'           => [
                'type'           => 'INT',
                'constraint'     => 10,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);


        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('Lessons', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('Lessons', TRUE);
    }
}