<?php

namespace App\Models;

use CodeIgniter\Model;

class TravelModel extends Model
{
    protected $table = 'travels';
    protected $primaryKey = 'id';

    public function getData()
    {
        $query = $this->db->table('travels')
            ->join('users', 'users.id = travels.author')
            ->select('travels.id as id, users.nama_lengkap as author_name, author, kategori, nama, gambar, caption_gambar, deskripsi')
            ->get()->getResultArray();

        return $query;
    }

    public function saveData($data)
    {
        $query = $this->db->table('travels')
            ->insert($data);

        return $query;
    }

    public function updateData($data, $id)
    {
        $query = $this->db->table('travels')
            ->update($data, array('id' => $id));

        return $query;
    }

    public function getSomeCarouselTravel()
    {
        $query = $this->db->table('travels')
            ->join('users', 'users.id = travels.author')
            ->select('travels.id as id, users.nama_lengkap as author_name, author, kategori, nama, gambar, caption_gambar, deskripsi')
            ->limit(5)
            ->get()->getResultArray();

        return $query;
    }

    public function getSomeCardTravel()
    {
        $query = $this->db->table('travels')
            ->join('users', 'users.id = travels.author')
            ->select('travels.id as id, users.nama_lengkap as author_name, author, kategori, nama, gambar, caption_gambar, deskripsi')
            ->where('kategori', 'alam')
            ->limit(3)
            ->get()->getResultArray();

        return $query;
    }

    public function getSomeCardFood()
    {
        $query = $this->db->table('travels')
            ->join('users', 'users.id = travels.author')
            ->select('travels.id as id, users.nama_lengkap as author_name, author, kategori, nama, gambar, caption_gambar, deskripsi')
            ->where('kategori', 'kuliner')
            ->limit(3)
            ->get()->getResultArray();

        return $query;
    }
}
