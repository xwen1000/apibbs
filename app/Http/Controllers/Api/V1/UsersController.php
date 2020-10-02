<?php

namespace App\Http\Controllers\Api\V1;

use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Requests\Api\V1\UserRequest;
use Illuminate\Auth\AuthenticationException;

class UsersController extends Controller
{
    //
    public function store(UserRequest $request)
    {
        $verifyData = \Cache::get($request->verification_key);
       if (!$verifyData) {
           abort(403, '验证码已失效');
        }

        if (!hash_equals($verifyData['code'], $request->verification_code)) {
            // 返回401
            throw new AuthenticationException('验证码错误');
        }

        $user = User::create([
            'name' => $request->name,
            'phone' => $verifyData['phone'],
            'password' => \Hash::make($request->password),
        ]);

        // 清除验证码缓存
        \Cache::forget($request->verification_key);

        return new UserResource($user);
    }

    public function show(User $user, Request $request)
    {
        return new UserResource($user);
    }

    public function me(Request $request)
    {
        return (new UserResource($request->user()))->showSensitiveFields();
    }
}
