<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KumpulanController extends Controller
{
    public function index()
    {

        return view('pages.homepage.index');
    }

    //UPDATE news SET slug=LOWER(REPLACE(title, ' ', '-'))
    
}
