<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $data = ['title' => "Admin | Dashboard"];
        return view('admin/index', $data);
    }
}
