<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class FallbackController extends Controller
{
    public function adminFallback(): \Illuminate\Http\Response
    {
        return response()->view('admin-dashboard.errors.404', [], 404);
    }

    public function userFallback(): \Illuminate\Http\Response
    {
        return response()->view('user.errors.404', [], 404);
    }

    public function ictaFallback(): \Illuminate\Http\Response
    {
        return response()->view('icta-dashboard.errors.404', [], 404);
    }

    public function mddtFallback(): \Illuminate\Http\Response
    {
        return response()->view('mddt-dashboard.errors.404', [], 404);
    }

    public function sarfFallback(): \Illuminate\Http\Response
    {
        return response()->view('sarf-dashboard.errors.404', [], 404);
    }
}
