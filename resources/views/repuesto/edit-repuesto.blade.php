@extends('layouts.base')

@section('title', 'Listado de Repuestos')

@section('navbar')
    <x-repuesto.repuesto-navbar />
@endsection

@section('menu')
    <x-repuesto.repuesto-menu />
@endsection

@section('content')
    <livewire:repuesto.editar-repuesto :id="$id" />
@endsection