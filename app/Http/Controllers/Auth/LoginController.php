<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::check()) {
                $user = Auth::user();
                if ($user->type == "user") {
                    $route_name = 'user-dashboard';
                } elseif ($user->type == "admin") {
                    $route_name = 'admin.admin-dashboard';
                } elseif ($user->type == "vendor") {
                    $route_name = 'vendor.vendor-dashboard';
                } else {
                    Auth::logout();
                    // flash('Xəta baş verdi!', 'error');
                    return redirect()->route('login');
                }

                // $this->logController->storeLogs('login', Auth::id(), 'login', Auth::user(), Auth::user()->full_name . ' sistemə daxil oldu.');
                flash('Sistemə daxil oldunuz!', 'success');
                return redirect()->route($route_name)->with('status', 'Sistemə daxil oldunuz.');
            }
        } else {
            return redirect()->back()->withErrors(['email' => 'Email və ya şifrə yalnışdır.'])->withInput();
        }
    }

    public function logout(Request $request)
    {
        // $this->logController->storeLogs('logout', Auth::id(), 'logout', Auth::user(), Auth::user()->full_name . ' sistemdən çıxış etdi.');
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Auth::logout();
        flash('Sistemdən çıxış etdiniz.', 'success');
        return redirect()->route('login');
    }

}
