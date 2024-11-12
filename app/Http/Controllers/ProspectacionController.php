<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProspectacionController extends Controller
{
    
    public function index()  
    {
        return view('prospectacion.inicio');
    }

}
