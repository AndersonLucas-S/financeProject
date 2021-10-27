@extends('adminlte::page')

@section('title', 'Saldo')

@section('content_header')
    <h1>Saldo</h1>

    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('balance') }}">Saldo</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <a href="{{  route('balance.deposit')  }}" class="btn btn-primary" style="margin-bottom: 1%;"><i class="fas fa-money-check-alt"></i> Recarregar</a>
            @if($amount > 0)
                <a href="{{  route('withdrawn')  }}" class="btn btn-success" style="margin-bottom: 1%;"><i class="fas fa-hand-holding-usd"></i> Sacar</a>
            @endif
            @if($amount > 0)
                <a href="{{ route('transfer') }}" class="btn btn-info" style="margin-bottom: 1%;"><i class="fas fa-cart-arrow-down"></i> Transferir</a>
            @endif
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')

            <div class="small-box bg-success">
                <div class="inner">
                    <h3>R$ {{  number_format($amount, 2, ',', '')  }}</h3>
                </div>
                <div class="icon">
                    <i class="ion ion-cash"></i>
                </div>
                <a href="{{ route('historic') }}" class="small-box-footer">Histórico <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@stop
