<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TestSeeder extends Seeder
{
    public function run()
    {
        $this->call('GroupSeeder');
        $this->call('PermissionSeeder');
        $this->call('GroupPermissionSeeder');
    }
}
