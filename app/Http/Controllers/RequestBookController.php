<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RequestBooks;
use App\Models\Books;

class RequestBookController extends Controller
{
   
    public function addrequestbook(Request $request){
        $RequestBooks = $request->validate([
            'daterequest' => 'required' ,
            'user_name' => 'required' ,
            'userphone' => 'required' ,
            'user_address' => 'required' ,
            'book_id' => 'required' ,
        ]);

       
            $RequestBook = RequestBooks::create([
                'daterequest' => $RequestBooks['daterequest'],
                'user_name' => $RequestBooks['user_name'],
                'userphone' => $RequestBooks['userphone'],
                'user_address' => $RequestBooks['user_address'],
                'book_id' => $RequestBooks['book_id'],
                ]);



            return response()->json([
                'status' => true ,
                'message' => 'ثبت درخواست کتاب موفقانه ذخیره شد' , 
                'data' => $RequestBook 
              ], 200);
    }  
    public function shoqreuqestbook(){
        $Books = Books::join('categories' , 'categories.cat_id' , 'books.cat_id')
        ->join('libraries' , 'libraries.lib_id' , 'categories.lib_id')
        ->join('users' , 'users.id' , 'categories.id')
        ->get();
        return response()->json($Books);
    }

    public function seereuqestbook(){
        $Books = RequestBooks::join('books' , 'books.book_id' , 'request_books.book_id')
        ->join('categories' , 'categories.cat_id' , 'books.cat_id')
        ->where('categories.id' , '=' , auth()->user()->id)
        ->get();
        return response()->json($Books);
    }



    public function editrequestbook(Request $request , $request_id){

    }

    public function deleterequestbook($request_id){

    }

}
