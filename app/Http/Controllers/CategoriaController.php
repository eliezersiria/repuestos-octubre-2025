<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        return view('categoria');
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Mostramos en formulario
        return view('categoria.agregar-categoria');
    }

     /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('categoria.listar-categoria');
    }

    public function trash()
    {
        return view('categoria.trash-categoria');
    }
}
