<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{
    use ApiResponse;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bookings = User::all();
        return $this->successResponse($bookings);
    }

    public function store(Request $request)
    {
        $rules = [
            'name'      => 'required|string',
            'email'     => 'required|string|email|unique:users',
            'password'  => 'required|string|min:7|confirmed',
            'phone'     => 'nullable|numeric',
            'type'      => 'required|in:Admin,Guest,User'
        ];

        $this->validate($request, $rules);
        $user = User::create([
            'name'      => $request->input('name'),
            'email'     => $request->input('email'),
            'password'  => Hash::make($request->input('password')),
            'phone'     => $request->input('phone'),
            'type'      => $request->input('type')
        ]);
        return $this->successResponse($user, Response::HTTP_CREATED);
    }

    public function show($user)
    {
        $user = User::findOrFail($user);
        return $this->successResponse($user);
    }

    public function update(Request $request, $user)
    {
        $user = User::findOrFail($user);
        $rules = [
            'name'      => 'required|string',
            'email'     => 'required|email|unique:users,email,'.$user->id,
            'password'  => 'required|string|confirmed',
            'phone'     => 'nullable|numeric',
            'type'      => 'required|in:Admin,Guest,User'
        ];
        $this->validate($request, $rules);
        $user->fill([
            'name'      => $request->input('name'),
            'email'     => $request->input('email'),
            'password'  => Hash::make($request->input('password')),
            'phone'     => $request->input('phone'),
            'type'      => $request->input('type')
        ]);
        if($user->isClean()){
            return $this->errorResponse("At least one value must change", Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $user->save();
        return $this->successResponse($user);
    }

    public function destroy($user)
    {
        $user = User::findOrFail($user);
        $user->delete();
        return $this->successResponse($user);
    }
}
