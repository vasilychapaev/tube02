<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function create() {
        return view('request.create');
    }

    public function store() {
        dd('req store');
    }
}
