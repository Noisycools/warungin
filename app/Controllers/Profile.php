<?php

namespace App\Controllers;

use App\Models\ProfileModel;

class Pages extends BaseController
{
    protected $profileModel;

    public function __construct()
    {
        $this->profileModel = new ProfileModel();
    }

    
}