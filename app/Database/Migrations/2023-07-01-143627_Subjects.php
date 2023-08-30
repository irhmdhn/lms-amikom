<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Subjects extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'code'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 10,
                'unique'         => true,
            ],
            'subj_name'      => [
                'type'           => 'VARCHAR',
                'constraint'     => 100,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP',
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('Subjects', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('Subjects');
    }
}
