<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori_Berita extends Model
{
    use HasFactory;

    protected $table = 'kategori_berita';

    protected $fillable = [
        'kategori', 'slug'
    ];

    public function kategori()
    {
        return $this->hasMany(Kategori_Berita::class, 'kategori_id');
    }
}
