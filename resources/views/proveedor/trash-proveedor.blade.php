@extends('layouts.base')

@section('title', 'Papelera de reciclaje - Proveedores')

@section('navbar')
    <x-proveedor.proveedor-navbar />
@endsection

@section('menu')
    <x-proveedor.proveedor-menu />
@endsection

@section('content')
    <livewire:proveedor.trash-proveedor />
@endsection