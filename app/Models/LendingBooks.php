<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LendingBooks extends Model
{
    protected $table = ('lending_books');
    protected $primaryKey = 'lending_id';

    protected $fillable = [
        'lending_id' ,
        'datelend' ,
        'datedeleiver' ,
        'customer_name' ,
        'CustomerPhone' ,
        'Customerdescription' ,
        'book_id' ,
     
    ];
}
