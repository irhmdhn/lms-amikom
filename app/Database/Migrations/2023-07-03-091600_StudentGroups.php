<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StudentGroups extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 2,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'code' => [
                'type'           => 'VARCHAR',
                'constraint'     => 4,
                'unique'         => true
            ],
            'major_id' => [
                'type'           => 'VARCHAR',
                'constraint'     => 2,
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('StudentGroups', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('StudentGroups');
    }
}
