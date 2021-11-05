<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
     public function index(){
        
        $users = User::all();
        
            return view('users.usersPage',compact('users',$users));
        }

        public function edit(){
                
            return view('users.usersPage');
        }

        public funcion update(Request $request){


              $this->validate($request,[
                    'firstname' => 'required|string|max:255',
                    'lastname' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:6|confirmed',
                    'phone' => 'required|integer',
                    'photo' => 'image|mimes:jpeg,jpg,png,svg:max:2048',

                    if($request->file('photo')){
                        $imagePath = $request->file('photo');
                        $imageName = rand().'.'.$request->getClientOriginalName();
                        $path = $request->file('photo')->storeAs('Profile_Uploads',$imageName,'public/images');

                        return response()->json([
                            'message' => 'Image Uploaded Successfully',
                            'Uploaded_image' => $path,
                            'class_name' => 'alert-success',
                        ]); 

                    else{
                        return response()->json([
                            'message'   => $validation->errors()->all(),
                            'uploaded_image' => '',
                           'class_name'  => 'alert-danger'
              ]);
                    }    

                   }
        ]);
    
                $user->firstname = $request->firstname;
                $user->lastname = $request->lastname;
                $user->email = $request->email;
                $user->password = $request->password;
                $user->phone = $request->phone;
                $user->photo = $imageName;

                $user->save();

                return redirect('/home');

        }

}        



