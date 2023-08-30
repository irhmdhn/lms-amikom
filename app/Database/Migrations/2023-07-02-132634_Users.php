<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        // $this->db->query('SET FOREIGN_KEY_CHECKS = 0');
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 10,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'user_id'      => [
                'type'          => 'VARCHAR',
                'constraint'    => 10,
                'null'          => true,
            ],
            'email' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'unique'         => true,
                'null'           => true,
            ],
            'password' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => true,
            ],
            'role'      => [
                'type'           => 'ENUM',
                'constraint'     => ['admin', 'dosen', 'mahasiswa'],
                'default'        => 'mahasiswa',
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
        // $this->forge->addForeignKey('user_id', 'admins', 'id', 'CASCADE', 'CASCADE');
        // $this->forge->addForeignKey('user_id', 'dosens', 'id', 'CASCADE', 'CASCADE');
        // $this->forge->addForeignKey('user_id', 'mahasiswas', 'id', 'CASCADE', 'CASCADE');

        // $this->db->query('ALTER TABLE users ADD CONSTRAINT fk_users_admins FOREIGN KEY (user_id) REFERENCES admins(id) ON DELETE CASCADE ON UPDATE CASCADE');
        // $this->db->query('ALTER TABLE users ADD CONSTRAINT fk_users_dosens FOREIGN KEY (user_id) REFERENCES dosens(id) ON DELETE CASCADE ON UPDATE CASCADE');
        // $this->db->query('ALTER TABLE users ADD CONSTRAINT fk_users_mahasiswas FOREIGN KEY (user_id) REFERENCES mahasiswas(id) ON DELETE CASCADE ON UPDATE CASCADE');

        // $this->db->query('SET FOREIGN_KEY_CHECKS = 1');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
