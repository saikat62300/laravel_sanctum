<?php
namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use App\Traits\HttpResponses;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use HttpResponses;

    public function register(UserRegisterRequest $request)
    {
        if ($request->validated()) {
            try {
                $user = User::create([
                    'name'       => $request->name,
                    'email'      => $request->email,
                    'password'   => Hash::make($request->password),
                    'created_at' => Carbon::now(),
                    'updated_at' => null,
                ]);

                return $this->success([
                    'user' => $user, 
                    'token' => $user->createToken('API Token of '. $user->email)->plainTextToken
                    ], 'User registered successfully', 200);
            } catch (\Exception $e) {
                return $this->error($e->getMessage(), 500);
            }

        }
    }
}
