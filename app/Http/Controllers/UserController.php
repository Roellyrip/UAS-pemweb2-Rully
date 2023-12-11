<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUsers()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            abort(404);
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
