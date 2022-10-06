<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    use HasFactory;

    // protected $table = 'event';

    /**
     * guardedx
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * image
     *
     * @return Attribute
     */
    // protected function image(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => asset('/storage/events/' . $value),
    //     );
    // }

    public function kategori_data()
    {
        return $this->belongsTo(KategoriData::class, 'kategori_id');
    }
}
