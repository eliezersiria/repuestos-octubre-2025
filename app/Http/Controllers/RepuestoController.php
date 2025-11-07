<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repuesto;

class RepuestoController extends Controller
{
    public function index()
    {
        return view('repuestos');
    }

    public function create()
    {
        return view('repuesto.agregar-repuesto');
    }

    public function show()
    {
        return view('repuesto.listar-repuesto');
    }

    public function edit($id)
    {
        return view('repuesto.edit-repuesto', compact('id'));
    }
}
