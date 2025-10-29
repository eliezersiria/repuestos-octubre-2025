@extends('layouts.base')

@section('title', 'Agregar Repuesto')

@section('navbar')
    <x-repuesto.repuesto-navbar />
@endsection

@section('menu')
    <x-repuesto.repuesto-menu />
@endsection

@section('content')
    <livewire:repuesto.show-repuestos />
@endsection