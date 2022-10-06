<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'banner';
 
    protected $guarded = [];

    // protected $fillable = [
    //     'judul', 'slug', 'kategori_id', 'foto', 'isi','tgl',

    // ];

    public function kategori_banner()
    {
        return $this->belongsTo(KategoriBanner::class, 'kategori_id');
    }

    // public function tags()
    // {
    //     return $this->belongsToMany(Tags::class, 'tags_id');
    // }
    
    protected function gambar(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset('/storage/banner/' .$value),
        );
    }

    
    protected function createdAt(): Attribute
    {   
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('d-M-Y'),
        );
    }

}
