@extends('adminlte::page')

@section('title', 'Transferir Saldo')

@section('content_header')

    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('balance') }}">Saldo</a></li>
        <li class="breadcrumb-item"><a href="{{ route('transfer') }}">Transferir</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3>Transferir Saldo</h3>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')

            <form method="POST" action="{{ route('transfer.confirm') }}">
                {!! csrf_field() !!}

                <div class="form-group">
                    <input type="text" name="sender" placeholder="Informe quem vai receber o valor (Nome ou E-mail)" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Próxima Etapa</button>
                </div>
            </form>
        </div>
    </div>
@stop
