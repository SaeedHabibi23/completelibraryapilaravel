<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SodBooks extends Model
{
    protected $table = ('sod_books');
    protected $primaryKey = 'sold_book_id';

    protected $fillable = [
        'sold_book_id' ,
        'datesold' ,
        'customer_name' ,
        'SoldPrice' ,
        'book_id' ,
     
    ];
}
