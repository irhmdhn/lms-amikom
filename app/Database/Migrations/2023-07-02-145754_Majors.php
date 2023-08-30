<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Majors extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 2,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'code'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 2,
                'unique'         => true,
            ],
            'code_name'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 4,
                'unique'         => true,
            ],
            'maj_name'       => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],

        ]);
        $this->forge->addKey('id', TRUE);

        $this->forge->createTable('Majors', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('Majors');
    }
}
