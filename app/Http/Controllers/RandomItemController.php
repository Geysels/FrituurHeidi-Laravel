<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RandomItemController extends Controller
{
    public function randomitem()
    {
        return view('randomitempage.randomitem-content');
    }
}
