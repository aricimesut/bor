<?php

namespace App\Services;

use App\Models\User;
use App\Repository\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthService extends MainService
{
    public function __construct()
    {
        $this->repository = new UserRepository();

        $this->rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $this->niceNames = [
            'email' => 'Email',
            'password' => 'Password',
        ];
    }

    /**
     * @param $request
     * @return array
     */
    public function login($request): array
    {
        $validator = Validator::make($request->all(), $this->rules, [], $this->niceNames);

        if ($validator->fails()) {
            $errors = implode(' ', $validator->errors()->all());
            return [
                'message' => $errors,
                'status' => 422,
                'data' => []
            ];
        }

        $credentials = $request->only('email', 'password');

        if ($token = auth()->attempt($credentials)) {
            return [
                'message' => 'Successful',
                'status' => 200,
                'data' => [
                    'token' => $token
                ]
            ];
        } else {
            return [
                'message' => 'Email or password is incorrect',
                'status' => 401,
                'data' => []
            ];
        }
    }
}
