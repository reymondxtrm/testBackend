<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
     public function addUser(Request $req){
         
       request()->validate([
            'name'=>'required',
            'contact'=>'required',
            'address'=>'required'
        ]);

        $user = new User;
        $user->name=$req->name;
        $user->contact=$req->contact;
        $user->address=$req->address;

        $user->save();
        return response()->json(['message'=>'added successfully']);
     }
     public function getUser(){
          $user = User::get();
          return response()->json($user);
     }

     public function deleteUser($id){
          $user = User::find($id);
          $user->delete();
          return response()->json(['message'=>'Deleted'],200);
     }
     public function editUser(Request $req, $id){
          request()->validate([
               'name'=>'required',
               'contact'=>'required',
               'address'=>'required'
          ]);
          $user = User::find($id);
          $user->name = $req->name;
          $user->contact= $req->contact;
          $user->address = $req->address;
          $user->save();
     }
     
}
