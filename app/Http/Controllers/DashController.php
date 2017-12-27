<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashController extends Controller
{
    public function index()
    {
        return View('dashboard.index');
    }

    public function cards()
    {
        return View('dashboard.cards');
    }

    public function orders()
    {
        return View('dashboard.orders');
    }

    public function companies()
    {
        return View('dashboard.companies');
    }

    public function ftth()
    {
        return View('dashboard.ftth');
    }
}
