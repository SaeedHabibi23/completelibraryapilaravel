<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;

class BookController extends Controller
{
    
    public function addbook(Request $request){
        $Book =   $request->validate([
            "book_name" => "required",
            "Prnityear" => "required",
            "NP" => "required",
            "buyPrice" => "required",
            "book_writer" => "required",
            "cat_id" => "required",
            "id" => "required",
            ]);

            $Books = Books::create([
                'book_name' => $Book['book_name'],
                'Prnityear' => $Book['Prnityear'],
                'NP' => $Book['NP'],
                'buyPrice' => $Book['buyPrice'],
                'book_writer' => $Book['book_writer'],
                'cat_id' => $Book['cat_id'],
                'id' => auth()->user()->id,
                ]);
    
           
            
                return response()->json([
                    'status' => true ,
                    'message' => 'کتاب موفقانه ذخیره شد' , 
                    'data' => $Books 
                  ], 200);
    }  
    public function showbook(){
        $Books = Books::join('categories' , 'categories.cat_id' , 'books.cat_id')
        ->join('libraries' , 'libraries.lib_id' , 'categories.lib_id')
        ->join('users' , 'users.id' , 'categories.id')
        ->where('books.id' , '=' , auth()->user()->id)
        ->get();
        return response()->json($Books);
    }
    public function editbook(Request $request, $book_id){
        $Books = Books::find($book_id);
        $Book =   $request->validate([
            "book_name" => "required",
            "Prnityear" => "required",
            "NP" => "required",
            "buyPrice" => "required",
            "book_writer" => "required",
            "cat_id" => "required",
            "id" => "required",
            ]);
// Add Acomect
            $Books->update([
                'book_name' => $Book['book_name'],
                'Prnityear' => $Book['Prnityear'],
                'NP' => $Book['NP'],
                'buyPrice' => $Book['buyPrice'],
                'book_writer' => $Book['book_writer'],
                'cat_id' => $Book['cat_id'],
                'id' => auth()->user()->id,
                ]);
    
                return response()->json([
                    'status' => true ,
                    'message' => 'کتاب موفقانه به‌روز شد' , 
                    'data' => $Books
                ], 200);

    }
    public function deletebook($book_id){
        $Books = Books::find($book_id);
        $Books->delete();
        return response()->json([
            'status' => true,
            'message' => 'کتاب موفقانه حذف شد',
        ], 200);
    }

}
