<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Calendar extends BaseController
{

    public function index()
    {
        return view('v_calendar');
    }
}
