<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RTeaching extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 4,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'teacher_id'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 10,
            ],
            'subj_code'          => [
                'type'           => 'VARCHAR',
                'constraint'     => 10,
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('RTeaching', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('RTeaching');
    }
}
