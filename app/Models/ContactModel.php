<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table = 'contacts';
    protected $primaryKey = 'id';

    public function getData()
    {
        $query = $this->db->table('contacts')
            ->join('users', 'users.id = contacts.replied_by')
            ->get()->getResultArray();

        return $query;
    }

    public function saveData($data)
    {
        $query = $this->db->table('contacts')
            ->insert($data);

        return $query;
    }
}
