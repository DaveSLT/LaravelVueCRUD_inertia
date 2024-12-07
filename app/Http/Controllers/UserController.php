<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Fetch all users
        $users = User::all();

        // Return the Inertia page with users data
        return inertia('UserDashboard', [
            'users' => $users,
        ]);
    }

    public function destroy(User $user)
    {
        // Delete the user
        $user->delete();

        // Redirect back with a success message
        return redirect()->route('dashboard')->with('success', 'User deleted successfully.');
    }
}
