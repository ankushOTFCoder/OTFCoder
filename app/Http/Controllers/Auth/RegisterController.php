<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
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
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone' => $data['phone'],
            'photo' => $data['photo'],

        ]);

            $user = User::all();
            $verifyUser = VerifyUser::create([
                'user_id' => $user->id,
                'token' => str_random(40)
        ]);

        Mail::to($user->email)->send(new VerifyMail($user));

        return $user;   
    }
}
