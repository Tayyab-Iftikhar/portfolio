<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use App\Http\Requests\CreateUser;
use App\Http\Requests\UpdateUser;
use App\Models\User;


use Illuminate\Http\Request;

class UserController extends Controller
{
    public function createUser(CreateUser $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        $user->assignRole($request->role);

        return response()->json(['success' => true, 'message' => 'Project Created.']);
    }

    public function showCreateUserForm()
    {
        $roles = Role::all();

        return view('frontend.pages.createUsers', compact('roles'));
    }

    public function show()
    {
        $users = User::select('id', 'name', 'email', 'created_at')->get();

        return view('frontend.pages.showUsers', compact('users'));
    }

    public function edit($id)
    {
        $users = User::find($id);
        $roles = Role::all();
        return view('frontend.pages.updateUser', compact('users', 'roles'));
    }

    public function update(UpdateUser $request, $id)
    {
        $users = User::find($id);
        $data = $request->validated();

        $users->assignRole($request->role);

        $users->update($data);

        return response()->json(['success' => true, 'message' => 'User Updated.']);
    }

    public function delete($id)
    {
        $users = User::find($id);

        if ($users) {
            $users->delete();
            return response()->json(['success' => true, 'message' => 'User deleted.']);
        } else {
            return response()->json(['success' => false, 'message' => 'User not found.'], 404);
        }
    }

    public function search()
    {
        $users = User::where('name', 'LIKE', '%' . request()->name . '%')->get();
        return view('frontend.pages.showUsers', compact('users'));
    }
}

