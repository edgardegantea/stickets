<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class AdminController extends BaseController
{
    public function __construct()
    {
        if (session()->get('role') != "admin") {
            echo 'Acceso no autorizado';
            exit;
        }
    }
    
    public function index()
    {
        return view("admin/dashboard");
    }
}
