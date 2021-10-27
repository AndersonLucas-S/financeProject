@extends('adminlte::page')

@section('title', 'Confirmar Tranferência')

@section('content_header')

    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('balance') }}">Saldo</a></li>
        <li class="breadcrumb-item"><a href="{{ route('transfer') }}">Transferir</a></li>
        <li class="breadcrumb-item"><a href="{{ route('transfer') }}">Confirmação</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <h3>Confirmar tranferência de valor</h3>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')

            <p><strong>Recebedor: </strong>{{ $sender->name }}</p>
            <p><strong>Seu saldo atual: </strong>R$ {{  number_format($balance->amount, 2, '.', '') }} </p>

            <form method="POST" action="{{ route('transfer.store') }}">
                {!! csrf_field() !!}

                <input type="hidden" name="sender_id" value="{{  $sender->id  }}">

                <div class="form-group">
                    <input type="text" name="value" placeholder="Valor:" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Transferir</button>
                </div>
            </form>
        </div>
    </div>
@stop
