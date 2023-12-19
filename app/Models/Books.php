<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $table = ('books');
    protected $primaryKey = 'book_id';

    protected $fillable = [
        'book_id' ,
        'book_name' ,
        'Prnityear' ,
        'NP' ,
        'buyPrice' ,
        'book_writer' ,
        'cat_id' ,
        'id'  ,
    ];
}
