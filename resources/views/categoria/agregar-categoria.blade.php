@extends('layouts.base')

@section('title', 'Agregar Categoria')

@section('navbar')
    <x-categoria.categoria-navbar />
@endsection

@section('menu')
    <x-categoria.categoria-menu />
@endsection

@section('content')
    <x-categoria.categoria-bread />
    <livewire:categoria.guardar-categoria />
@endsection