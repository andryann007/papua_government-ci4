<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'manage-users',
                'description' => 'Manage Users Data'
            ],
            [
                'name' => 'manage-profile',
                'description' => 'Manage Profile Data'
            ],
            [
                'name' => 'manage-news',
                'description' => 'Manage News Data'
            ],
            [
                'name' => 'manage-travels',
                'description' => 'Manage Travels Data'
            ],
            [
                'name' => 'reply-contacts',
                'description' => 'Reply Contact Us'
            ],
        ];

        $this->db->table('auth_permissions')->insertBatch($data);
    }
}
