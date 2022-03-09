@extends('adminlte::page')

@section('title', 'Saldos')

@section('content_header')
<h1>Saldos</h1>
@stop

@section('content')

@if($user->hasRole('superadmin'))
@include('admin.includes.balance.superadmin')

@elseif($user->hasRole('motorista'))
@include('admin.includes.balance.motorista')

@elseif($user->hasRole('secretaria'))
@include('admin.includes.balance.secretaria')

@else
@include('admin.includes.balance.newuser')

@endif

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop
