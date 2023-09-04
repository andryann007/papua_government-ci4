<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateContact extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'auto_increment'    => true,
            ],

            'nama' => [
                'type'              => 'VARCHAR',
                'constraint'        => '30',
            ],

            'email' => [
                'type'              => 'VARCHAR',
                'constraint'        => '30',
            ],

            'subyek' => [
                'type'              => 'VARCHAR',
                'constraint'        => '150',
            ],

            'pesan' => [
                'type'              => 'TEXT'
            ],

            'replied' => [
                'type'              => 'TINYINT',
                'constraint'        => 1,
                'null'              => 0,
                'default'           => 0
            ],

            'replied_by' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
                'null'              => true
            ],

            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',

            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('replied_by', 'users', 'id');
        $this->forge->createTable('contacts', true);
    }

    public function down()
    {
        $this->forge->dropTable('contacts', true);
    }
}
