<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class routeecontroller extends Controller
{
    public function index () {
        return view('all.index');
    }

    public function create () {
        return view('all.create');
    }

    
    public function edit () {
        return view('all.edit');
    }


}
