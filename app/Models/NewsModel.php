<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'id';

    public function getData()
    {
        $query = $this->db->table('news')
            ->join('users', 'users.id = news.author')
            ->select('news.id as id, users.nama_lengkap as author_name, author, kategori, title, gambar, caption_gambar, deskripsi')
            ->get()->getResultArray();

        return $query;
    }

    public function saveData($data)
    {
        $query = $this->db->table('news')
            ->insert($data);

        return $query;
    }

    public function updateData($data, $id)
    {
        $query = $this->db->table('news')
            ->update($data, array('id' => $id));

        return $query;
    }

    public function getSomeNews()
    {
        $query = $this->db->table('news')
            ->join('users', 'users.id = news.author')
            ->select('news.id as id, users.nama_lengkap as author_name, author, kategori, title, gambar, caption_gambar, deskripsi, news.created_at as news_date')
            ->limit(3)
            ->get()->getResultArray();

        return $query;
    }
}
