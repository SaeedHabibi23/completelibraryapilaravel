<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libraries extends Model
{
    protected $table = ('libraries');
    protected $primaryKey = 'lib_id';

    protected $fillable = [
        'lib_name' ,
        'lib_id' ,
        'id' ,
     
    ];
}
