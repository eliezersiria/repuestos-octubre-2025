@extends('layouts.base')

@section('title', 'Repuestos')

@section('navbar')
    <x-repuesto.repuesto-navbar />
@endsection

@section('menu')
    <x-repuesto.repuesto-menu />
@endsection

@section('content')
    <kbd class="kbd kbd-lg">Módulos de Repuestos</kbd>
@endsection