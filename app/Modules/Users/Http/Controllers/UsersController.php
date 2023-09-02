<?php

namespace App\Modules\Users\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Users\Models\Admin;
use App\Modules\Users\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $adminUsers = Admin::admins()->get();

        dd($adminUsers);
        return view("Users::welcome");
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Check the user type and redirect accordingly
            switch ($user->user_type) {
                case 'admin':
                    return redirect()->route('admin.dashboard');
                    break;
                case 'customer':
                    return redirect()->route('customer.dashboard');
                    break;
                case 'employee':
                    return redirect()->route('employee.dashboard');
                    break;
                default:
                    // Handle any other user types or scenarios
                    break;
            }
        }

        return redirect()->route('login')
            ->with('error', 'Invalid credentials');
    }

}
