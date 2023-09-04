<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GroupSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'super-admin',
                'description' => 'Super Admin, have full access as website administrator including manage users'
            ],
            [
                'name' => 'admin',
                'description' => 'Admin, just like Super Admin but cannot manage users'
            ],
        ];

        $this->db->table('auth_groups')->insertBatch($data);
    }
}
