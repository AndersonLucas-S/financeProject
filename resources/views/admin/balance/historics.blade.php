@extends('adminlte::page')

@section('title', 'Histórico de movimentação')

@section('content_header')
    <h1>Histórico de movimentação</h1>


    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('historic') }}">Histórico</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            <form action="{{ route('historic.search') }}" method="POST" class="form form-inline">
                {!! csrf_field() !!}
                <input type="text" name="id" class="form-control" placeholder="ID">
                <input type="date" name="date" class="form-control">
                <select name="type" class="form-control">
                    <option value="">-- Selecione --</option>
                    @foreach($types as $key => $type)
                        <option value="{{ $key }}">{{ $type }} </option>
                    @endforeach
                </select>

                <button type="submit" class="btn btn-primary" style="margin-left: 1%;">Pesquisar</button>
            </form>
        </div>
        <div class="box-body" style="margin-top: 1%;">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Valor</th>
                        <th>Tipo</th>
                        <th>Data</th>
                        <th>Remetente</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($historics as $historic)
                        <tr>
                            <td>{{ $historic->id }}</td>
                            <td>{{ number_format($historic->amount, 2, '.', '') }}</td>
                            <td>{{ $historic->type($historic->type) }}</td>
                            <td>{{ $historic->date }}</td>
                            <td>
                                @if($historic->user_id_transaction)
                                    {{ $historic->userSender->name }}
                                @else
                                    -
                                @endif
                            </td>
                        </tr>
                        @empty
                    @endforelse
                </tbody>
            </table>
            @if(isset($dataForm))
                {!! $historics->appends($dataForm)->links() !!}
            @else
                {!! $historics->links() !!}
            @endif
        </div>
    </div>
@stop
