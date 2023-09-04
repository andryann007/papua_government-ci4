<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBerita extends Migration
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

            'kategori' => [
                'type'              => 'ENUM',
                'constraint'        => ['umum', 'ekonomi', 'politik', 'kesehatan', 'olahraga', 'edukasi', 'otomotif', 'sains'],
                'default'           => 'umum',
            ],

            'author' => [
                'type'              => 'INT',
                'constraint'        => 11,
                'unsigned'          => true,
            ],

            'title' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
            ],

            'gambar' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
            ],

            'caption_gambar' => [
                'type'              => 'VARCHAR',
                'constraint'        => '255',
            ],

            'deskripsi' => [
                'type'              => 'TEXT'
            ],

            'created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP',

            'updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP',
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('author', 'users', 'id');
        $this->forge->createTable('news', true);
    }

    public function down()
    {
        $this->forge->dropTable('news', true);
    }
}
