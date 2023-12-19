<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libraries;
use App\Models\User;

class LibraryController extends Controller
{
    
    public function addlibrary(Request $request){
        $librarys =   $request->validate([
            "lib_name"  => "required",
            "id"  => "required",
            ]);

            $Libraries = Libraries::where('id' , $request->id)->first();

            if($Libraries){
                return response()->json([
                    'message' => ' هر کتابخونه فقط برای یک یوزر ساخته میشود' 
            ]);
            }else{
            $addlibrary = Libraries::create([
                'lib_name' => $librarys['lib_name'],
                'id' => $librarys['id'],
                ]);
    
            }
            
                return response()->json([
                    'status' => true ,
                    'message' => 'کتابخونه موفقانه ذخیره شد' , 
                    'data' => $addlibrary 
                  ], 200);
    }
    public function showlibrary(){
        $Librariess = Libraries::join('users' , 'users.id' , 'libraries.id')
        ->get();
        return response()->json($Librariess);
    }
    public function editlibrary(Request $request, $lib_id){
        $Librariess = Libraries::find($lib_id);
        $librarys =   $request->validate([
            "lib_name"  => "required",
            "id"  => "required",
            ]);

              
        $Librariess->update([
            'lib_name' => $librarys['lib_name'],
            'id' => $librarys['id'],
        ]);
        return response()->json([
            'status' => true ,
            'message' => 'کتابخونه موفقانه به‌روز شد' , 
            'data' => $Librariess
        ], 200);
    }
    public function deletelibrary($lib_id){
        $Librariess = Libraries::find($lib_id);
        $Librariess->delete();
        return response()->json([
            'status' => true,
            'message' => 'کتابخونه موفقانه حذف شد',
        ], 200);
    }

}
