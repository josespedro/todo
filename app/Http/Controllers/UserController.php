<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\Models\User;


class UserController extends Controller
{
    public function uploadAvatar(Request $request){
        if($request->hasFile('image')){
           User::uploadAvatar($request->image);
           return redirect()->back()->with('message','Image Uploaded Successfully !');
        }
        return redirect()->back()->with('error','Fail to Upload Image !!!');
    }
    public function index(){
        // $user = new User();
        // $user->name = 'John Doe';
        // $user->email = 'john@email.com';
        // $user->password = bcrypt('@johndoe');
        // $user->save();
        // dd($user);
        
        // User::where('id',4)->update(['name'=>'Basanta']);
        // $data = [
        //     'name'=>'Athor',
        //     'email'=>'athor@email.com',
        //     'password'=>('password'),

        // ];
       // $user = User::create($data);
        // $user = User::all();
        // return $user;

        // User::where('id',3)->delete();


        // DB::insert('insert into users (name,email,password) values(?,?,?)',[
        //     'basanta','basanta@email.com','password'
        // ]);
        // DB::update('update users set name = ?  where id = 1',['John Doe']);
        // DB::delete('delete from users');
        // $users = DB::select('select * from users');
        // return $users;
        // return view('home');
    }
    
}
