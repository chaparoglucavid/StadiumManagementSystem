<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use MongoDB\Driver\Session;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin-dashboard.dashboard');
    }

    public function change_language(Request $request)
    {
        $locale = $request->shortened;
        App::setLocale($locale);
        \Illuminate\Support\Facades\Session::put('locale', $locale);

        return response()->json([
            'status' => true,
        ]);
    }
}
