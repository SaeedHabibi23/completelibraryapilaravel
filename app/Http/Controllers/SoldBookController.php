<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\SodBooks;

class SoldBookController extends Controller
{
    
    public function addsoldbook(Request $request){
        $SodBook = $request->validate([
            'datesold' => 'required',
            'customer_name' => 'required',
            'SoldPrice' => 'required',
            'book_id' => 'required',
        ]);

       
            $SodBooks = SodBooks::create([
                'datesold' => $SodBook['datesold'],
                'customer_name' => $SodBook['customer_name'],
                'SoldPrice' => $SodBook['SoldPrice'],
                'book_id' => $SodBook['book_id'],
                ]);



            return response()->json([
                'status' => true ,
                'message' => 'فروش کتاب موفقانه ذخیره شد' , 
                'data' => $SodBooks 
              ], 200);
    }  
    public function showsoldbook(){
        $SodBooks = SodBooks::join('books' , 'books.book_id' , 'sod_books.book_id')
        ->join('categories' , 'categories.cat_id' , 'books.cat_id')
        ->join('libraries' , 'libraries.lib_id' , 'categories.lib_id')
        ->join('users' , 'users.id' , 'categories.id')
        ->where('books.id' , '=' , auth()->user()->id)
        ->get();
        return response()->json($SodBooks);
    }
    public function editsoldbook(Request $request , $sold_book_id){
        $SodBooks = SodBooks::find($sold_book_id);
        $SodBook = $request->validate([
            'datesold' => 'required',
            'customer_name' => 'required',
            'SoldPrice' => 'required',
            'book_id' => 'required',
        ]);

        $SodBooks->update([
            'datesold' => $SodBook['datesold'],
            'customer_name' => $SodBook['customer_name'],
            'SoldPrice' => $SodBook['SoldPrice'],
            'book_id' => $SodBook['book_id'],
            ]);

            return response()->json([
                'status' => true ,
                'message' => 'فروش کتاب به‌روز شد' , 
                'data' => $SodBooks
            ], 200);

    }
    public function deletebook($sold_book_id){
        $SodBooks = SodBooks::find($sold_book_id);
        $SodBooks->delete();
        return response()->json([
            'status' => true,
            'message' => 'فروش کتاب موفقانه حذف شد',
        ], 200);
    }


}
