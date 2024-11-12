<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProyeccionProfesionalController extends Controller
{
    
    public function index()  
    {
        return view('proyeccionProfesional.index');
    }

}
