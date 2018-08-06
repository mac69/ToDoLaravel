<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register(Request $request)
    {
        $user = $this->user->create([
          'name' => $request->get('name'),
          'email' => $request->get('email'),
          'password' => bcrypt($request->get('password'))
        ]);
        return response()->json(['status'=>true,'message'=>'User created successfully','data'=>$user]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // $user = User::where('email','=',$request->get('email'))->where('password','=',bcrypt($request->get('password'))->first());
        $userCount = User::where('email','=',$request->get('email'))->count();
        $user = User::where('email','=',$request->get('email'))->first();
        if ($userCount > 0) {
            if (Hash::check($request->get('password'), $user->password))
                {
                    $data = [
                        "result" => "OK",
                        "name" =>  $user->name,
                        "userId" => $user->id,
                    ];
                   return $data;
                }
        }
        return response()->json("Not registered");
    }
}
