<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddNamaLengkap extends Migration
{
    public function up()
    {
        $fields = [
            'nama_lengkap'  => ['type' => 'varchar', 'constraint' => 120, 'after' => 'username'],
            'user_image'    => ['type' => 'varchar', 'constraint' => 120, 'default' => 'default.svg', 'after' => 'nama_lengkap'],
        ];

        $this->forge->addColumn('users', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('users', 'nama_lengkap');
        $this->forge->dropColumn('users', 'user_image');
    }
}
