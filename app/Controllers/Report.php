<?php

namespace App\Controllers;

class Report extends BaseController
{
    public function index()
    {
        return view('admin/report/index');
    }
}
