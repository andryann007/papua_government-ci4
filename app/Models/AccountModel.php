<?php

namespace App\Models;

use CodeIgniter\Model;

class AccountModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';

    public function getData()
    {
        $query = $this->db->table('users')
            ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
            ->select('id, nama_lengkap, email, username, password_hash, user_image, active, group_id')
            ->get()->getResultArray();

        return $query;
    }

    public function saveData($data)
    {
        $query = $this->db->table('users')
            ->insert($data);

        return $query;
    }

    public function updateData($data, $id)
    {
        $query = $this->db->table('users')
            ->update($data, array('id' => $id));

        return $query;
    }
}
