<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    private $userModel;
    
    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }
    
    public function register(Request $request)
    {
        $inputs = $request->all();
        $user = $this->userModel->create([
            'name'     => $inputs['name'],
            'email'    => $inputs['email'],
            'password' => bcrypt($inputs['password']),
        ]);
        
        return [
            'status'  => 200,
            'message' => 'Registered.',
            'data'    => $user,
        ];
    }
    
    public function login(Request $request)
    {
        $inputs = $request->all();
        $user = $this->userModel->where('email', $inputs['email']);
        if( ! $user) {
            return [
                'status'  => 401,
                'message' => 'User not found.',
            ];
        }
        if( ! Hash::check($inputs['password'], $user->password)) {
            return [
                'status'  => 401,
                'message' => 'Wrong password.',
            ];
        }
        
        return [
            'status'  => 200,
            'message' => 'Authenticated.',
            'data'    => $user,
        ];
    }
}
