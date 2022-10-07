<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $table = 'album_foto';
 
    protected $guarded = [];
    
    protected function foto(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset('/storage/album/' .$value),
        );
    }
    
    protected function createdAt(): Attribute
    {   
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('d-M-Y'),
        );
    }

    protected function fotos()
    {
        return $this->hasMany(Album::class);
    }

}
