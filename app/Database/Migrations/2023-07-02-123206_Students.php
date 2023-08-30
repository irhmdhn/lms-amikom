<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Students extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 10,
                'unique'         => true,
            ],
            'nim'       => [
                'type'           => 'INT',
                'constraint'     => 10,
            ],
            'name'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'major'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 2,
            ],
            'group'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 4,
            ],
        ]);
        $this->forge->addKey('id', TRUE);

        $this->forge->createTable('Students', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('Students');
    }
}
