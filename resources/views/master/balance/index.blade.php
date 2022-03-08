@extends('adminlte::page')

@section('title', 'Saldos')

@section('content_header')
<h1>Saldos</h1>
@stop

@section('content')

@if($user->hasRole('superadmin'))
@include('includes.balance.superadmin')

@elseif($user->hasRole('motorista'))
@include('includes.balance.motorista')

@elseif($user->hasRole('secretaria'))
@include('includes.balance.secretaria')

@else
@include('includes.balance.newuser')

@endif

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop
