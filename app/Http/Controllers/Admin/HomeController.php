<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('admin.index');   /* creamos una carpeta admin en nuestro archivo de vista, se hace para 
                                        separar las vistas de admin con las otras */
    }
}
