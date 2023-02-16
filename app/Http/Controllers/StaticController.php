<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function privacypolicy()
    {
        return view('pages.privacy_policy.index');
    }
    
}
