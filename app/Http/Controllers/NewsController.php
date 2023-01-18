<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function archive()
    {
        return view('pages.news.category');
    }

    public function index()
    {
        return view('pages.news.single');
    }
}
