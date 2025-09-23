<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class InputController
{

     public function __construct()
    {
        $this->checkAdminAccess();
    }
     private function checkAdminAccess()
    {
         if (!Auth::guard('admin')->check()) {
            abort(403, 'Unauthorized access');
        }

        // Check if midwife has admin role
        $user = Auth::guard('admin')->user();

        // Check if role field exists, is not null, and is set to 'admin'
        if (!isset($user->role) || $user->role === null || empty($user->role) || $user->role !== 'admin') {
            abort(403, 'admin access required');
        }
    }
    public function index()
    {
        return view('input');
    }
}
