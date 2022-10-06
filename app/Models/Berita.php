<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';
 
    protected $guarded = [];

    // protected $fillable = [
    //     'judul', 'slug', 'kategori_id', 'foto', 'isi','tgl',

    // ];

    public function kategori_berita()
    {
        return $this->belongsTo(Kategori_Berita::class, 'kategori_id');
    }

    // public function tags()
    // {
    //     return $this->belongsToMany(Tags::class, 'tags_id');
    // }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
        

    
    protected function foto(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset('/storage/berita/' . $value),
        );
    }

    
    protected function createdAt(): Attribute
    {   
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('d-M-Y'),
        );
    }

}
