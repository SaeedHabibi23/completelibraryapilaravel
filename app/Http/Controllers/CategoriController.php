<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
class CategoriController extends Controller
{
    
    public function addcatehori(Request $request){
        $Categoriess =   $request->validate([
            "lib_id"  => "required",
            // "id"  => "required",
            "cat_name"  => "required",
            ]);

            $Categories = Categories::create([
                'lib_id' => $Categoriess['lib_id'],
                'id' => auth()->user()->id,
                'cat_name' => $Categoriess['cat_name'],
                ]);
    
           
            
                return response()->json([
                    'status' => true ,
                    'message' => 'کتگوری موفقانه ذخیره شد' , 
                    'data' => $Categories 
                  ], 200);
    }
    public function showcategori(){
        $Categoriess = Categories::join('libraries' , 'libraries.lib_id' , 'categories.lib_id')
        ->join('users' , 'users.id' , 'categories.id')
        ->where('categories.id' , '=' , auth()->user()->id)
        ->get();
        return response()->json($Categoriess);
    }
    public function editcategori(Request $request, $cat_id){
        $Categories = Categories::find($cat_id);
        $Categoriess =   $request->validate([
            "lib_id"  => "required",
            "id"  => "required",
            "cat_name"  => "required",
            ]);

              
        $Categories->update([
            'lib_id' => $Categoriess['lib_id'],
            'cat_name' => $Categoriess['cat_name'],
            'id' => $Categoriess['id'],
        ]);
        return response()->json([
            'status' => true ,
            'message' => 'کتگوری موفقانه به‌روز شد' , 
            'data' => $Categories
        ], 200);
    }
    public function deletecategori($cat_id){
        $Categories = Categories::find($cat_id);
        $Categories->delete();
        return response()->json([
            'status' => true,
            'message' => 'کتگوری موفقانه حذف شد',
        ], 200);
    }

}
