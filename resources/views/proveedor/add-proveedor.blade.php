@extends('layouts.base')

@section('title', 'Proveedores')

@section('navbar')
    <x-proveedor.proveedor-navbar />
@endsection

@section('menu')
    <x-proveedor.proveedor-menu />
@endsection

@section('content')
    <livewire:proveedor.agregar-proveedor />
@endsection