<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataStatis extends Model
{
    use HasFactory;

    protected $table = 'data_statis';
 
    protected $guarded = [];

}
