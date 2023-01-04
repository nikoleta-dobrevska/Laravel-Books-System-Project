<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if($request->is_admin) {
            $user->update([
                'is_admin'=>$request->is_admin==true
            ]);
        }

        if($request->is_admin[1]) {
            $user->update([
                'is_admin'=>$request->is_admin==false
            ]);
        }

        return to_route('admin.users.index')->with('success', 'The role has been updated successfully!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return to_route('admin.users.index')->with('danger', 'The user has been deleted!');
    }
}
