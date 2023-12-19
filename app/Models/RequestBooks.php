<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestBooks extends Model
{
    protected $table = ('request_books');
    protected $primaryKey = 'request_id';

    protected $fillable = [
        'request_id' ,
        'daterequest' ,
        'user_name' ,
        'userphone' ,
        'user_address' ,
        'book_id' 
     
    ];
}
