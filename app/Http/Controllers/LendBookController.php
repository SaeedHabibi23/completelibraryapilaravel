<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LendingBooks;

class LendBookController extends Controller
{
    
    public function addlendingbook(Request $request){
        $LendingBooks = $request->validate([
            'datelend' => 'required' ,
            'datedeleiver' => 'required' ,
            'customer_name' => 'required' ,
            'CustomerPhone' => 'required' ,
            'Customerdescription' => 'required' ,
            'book_id' => 'required' ,            
        ]);

       
            $LendingBook = LendingBooks::create([
                'datelend' => $LendingBooks['datelend'],
                'datedeleiver' => $LendingBooks['datedeleiver'],
                'customer_name' => $LendingBooks['customer_name'],
                'CustomerPhone' => $LendingBooks['CustomerPhone'],
                'Customerdescription' => $LendingBooks['Customerdescription'],
                'book_id' => $LendingBooks['book_id'],
                ]);



            return response()->json([
                'status' => true ,
                'message' => 'قرض کتاب موفقانه ذخیره شد' , 
                'data' => $LendingBook 
              ], 200);
    }
    public function showlendingbook(){
        $LendingBooks = LendingBooks::join('books' , 'books.book_id' , 'lending_books.book_id')
        ->join('categories' , 'categories.cat_id' , 'books.cat_id')
        ->join('libraries' , 'libraries.lib_id' , 'categories.lib_id')
        ->join('users' , 'users.id' , 'categories.id')
        ->where('books.id' , '=' , auth()->user()->id)
        ->get();
        return response()->json($LendingBooks);
    }
    public function editlendingbook(Request $request, $lending_id){
        $LendingBooks = LendingBooks::find($lending_id);

 $LendingBook = $request->validate([
            'datelend' => 'required' ,
            'datedeleiver' => 'required' ,
            'customer_name' => 'required' ,
            'CustomerPhone' => 'required' ,
            'Customerdescription' => 'required' ,
            'book_id' => 'required' ,            
        ]);

       
            $LendingBooks->update([
                'datelend' => $LendingBook['datelend'],
                'datedeleiver' => $LendingBook['datedeleiver'],
                'customer_name' => $LendingBook['customer_name'],
                'CustomerPhone' => $LendingBook['CustomerPhone'],
                'Customerdescription' => $LendingBook['Customerdescription'],
                'book_id' => $LendingBook['book_id'],
                ]);

                return response()->json([
                    'status' => true ,
                    'message' => ' کتاب قرضی به‌روز شد' , 
                    'data' => $LendingBooks
                ], 200);

    }
    public function deletelendingbook($lending_id){
        $LendingBooks = LendingBooks::find($lending_id);
        $LendingBooks->delete();
        return response()->json([
            'status' => true,
            'message' => ' کتاب قرضی موفقانه حذف شد',
        ], 200);
    }


}
