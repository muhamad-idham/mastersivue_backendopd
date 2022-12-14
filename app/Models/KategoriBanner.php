<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBanner extends Model
{
    use HasFactory;
    protected $table = 'kategori_banner';

    // fillabel
    protected $fillable = [
        'kategori',
        'slug',
        'isi',
        'data_id',
    ];
    protected $guarded = [];

    // relationship with data_statis
    public function banner()
    {
        // has Many
        return $this->hasMany(Banner::class, 'kategori_id');
    }
}
