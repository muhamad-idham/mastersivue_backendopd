<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;

    protected $table = 'foto';
 
    protected $guarded = [];

    // protected $fillable = [
    //     'judul', 'slug', 'kategori_id', 'foto', 'isi','tgl',

    // ];

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id');
    }

    // public function tags()
    // {
    //     return $this->belongsToMany(Tags::class, 'tags_id');
    // }
    
    protected function foto(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset('/storage/galerifoto/' .$value),
        );
    }

    
    protected function createdAt(): Attribute
    {   
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('d-M-Y'),
        );
    }

}
