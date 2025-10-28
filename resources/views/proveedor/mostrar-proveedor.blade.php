@extends('layouts.base')

@section('title', 'Lista de Proveedores')

@section('navbar')
    <x-proveedor.proveedor-navbar />
@endsection

@section('menu')
    <x-proveedor.proveedor-menu />
@endsection

@section('content')
    <livewire:proveedor.show-proveedores />
@endsection