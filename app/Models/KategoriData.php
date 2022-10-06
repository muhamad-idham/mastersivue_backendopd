<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriData extends Model
{
    use HasFactory;

    // fillabel
    protected $fillable = [
        'kategori',
        'slug',
        'isi',
        'data_id',
    ];

    // relationship with data_statis
    public function data_statis()
    {
        // has Many
        return $this->hasMany(DataStatis::class, 'kategori_id');
    }
}
