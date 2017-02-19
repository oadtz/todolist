<?php

namespace App\Http\Controllers;

class SiteController extends Controller {

    public function index()
    {
        return view('index');
    }

    public function pending()
    {
        return view('pending');
    }

    public function done()
    {
        return view('done');
    }

    public function login()
    {
        return view('login');
    }

    public function logout()
    {
        return view('logout');
    }

    public function item()
    {
        return view('item');
    }

}