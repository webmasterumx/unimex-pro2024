<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestVocacionalController extends Controller
{
    
    public function index()  {
        return view('testVocacional.index');
    }

    public function iniciarTest()  
    {
        return view('testVocacional.test');
    }

}
