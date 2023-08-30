<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Teachers extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 10,
                'unique'         => true,
            ],
            'nik'       => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'name'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
        ]);
        $this->forge->addKey('id', TRUE);

        $this->forge->createTable('Teachers', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('Teachers');
    }
}