<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{

    protected $fillable =
    ['id',
    'judul',
    'kategori',
    'deskripsi',
    'isi',
    'gambar',
    'user_id'];

    public function user()
    {
        return $this->hasone('App\user','id','user_id');
    }
}
