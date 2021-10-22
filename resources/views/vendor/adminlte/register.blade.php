@extends('adminlte::master')

@section('adminlte_css')
    @yield('css')
@stop

@section('body_class', 'register-page')

@section('body')
    <div class="register-box">
        <div class="register-logo">
            <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}">{!! config('adminlte.logo', '<b>Admin</b>LTE') !!}</a>
        </div>

        <div class="register-box-body">
            <p class="login-box-msg">{{ trans('adminlte::adminlte.register_message') }}</p>
            <form action="{{ route('user.store') }}" method="POST">
                {{ csrf_field() }}

                    <input type="text" name="name" class="form-control" placeholder="Nome">
                    <br/>
                    <input type="email" name="email" class="form-control" placeholder="E-mail">
                    <br/>
                    <input type="cpf" name="cpf" class="form-control" placeholder="CPF">
                    <br/>
                    <input type="password" name="password" class="form-control" placeholder="Senha">
                     <br/>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar Senha">
                    <br/>
                    
                <button type="submit" class="btn btn-primary btn-block btn-flat">
                    Registrar
                </button>
            </form>
            <br>
            <p>
                <a href="{{ url(config('adminlte.login_url', 'login')) }}" class="text-center">
                    {{ trans('adminlte::adminlte.i_already_have_a_membership') }}
                </a>
            </p>
        </div>
        <!-- /.form-box -->
    </div><!-- /.register-box -->
@stop

@section('adminlte_js')
    @yield('js')
@stop
