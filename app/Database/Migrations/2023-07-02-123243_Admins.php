<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Admins extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 15,
                'unique'         => true,
            ],
            'name'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 20,
            ],
        ]);
        $this->forge->addKey('id', TRUE);

        $this->forge->createTable('admins', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('admins');
    }
}
