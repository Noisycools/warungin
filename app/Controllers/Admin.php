<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        $data = ['title' => "Admin | Dashboard"];
        return view('admin/index', $data);
    }

    public function lap_harian()
    {
        $data = ['title' => "Admin | Dashboard"];
        return view('admin/', $data);
    }

    public function lap_mingguan()
    {
        $data = ['title' => "Admin | Dashboard"];
        return view('admin/', $data);
    }

    public function lap_bulanan()
    {
        $data = ['title' => "Admin | Dashboard"];
        return view('admin/', $data);
    }

    public function lap_tahunan()
    {
        $data = ['title' => "Admin | Dashboard"];
        return view('admin/', $data);
    }
}
