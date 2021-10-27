@extends('adminlte::page')

@section('title', 'Home Dashboard')

@section('content_header')

    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('balance') }}">Saldo</a></li>
        <li class="breadcrumb-item"><a href="{{ route('withdrawn') }}">Saque</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3>Sacar</h3>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')

            <form method="POST" action="{{ route('withdrawn.store') }}">
                {!! csrf_field() !!}

                <div class="form-group">
                    <input type="text" name="value" placeholder="Valor Saque" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Sacar</button>
                </div>
            </form>
        </div>
    </div>
@stop
