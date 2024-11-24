<?php

namespace App\Http\Controllers;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    // public function login()
    // {
    //     return view("/");
    // }

    public function registerForm()
    {
        $menulist = Menu::with('items')->where('name', 'navbar')->firstOrFail()->toArray();

        return view("auth.register")->with('navbar', $menulist);
    }

    public function register(Request $request)
    {

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:4',
            'confirm_password' => 'required|string|min:4',
        ]);

        if ($data['password'] = $data['confirm_password']) {
            // Create the user
            $roleId = Role::where('name', 'user')->first()->id;

            User::create([...$data, 'role_id' => $roleId]);

            return redirect()->route('gallery')->with('success', 'Registration successful! Please login.');
        }
        return redirect()->route('/registerForm')
            ->with('error', 'Registration Failed! Please try again.');

    }
}
