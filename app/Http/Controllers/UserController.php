<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->paginate();
        return response($users, Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $user = User::create(
            $request->only('first_name', 'last_name', 'email') +
                ['password' => Hash::make('1234')]
        );
        return response($user, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $user = User::with('role')->find($id);
        return response($user, Response::HTTP_OK);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->only('first_name', 'last_name', 'email'));
        return response($user, Response::HTTP_ACCEPTED);
    }

    public function destroy($id)
    {
        User::destroy($id);
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
