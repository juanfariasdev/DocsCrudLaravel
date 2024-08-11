@extends('components.layouts.app')

@section('content')
    @if (Request::is('login'))
        <x-layouts.auth title="Login">
            @include('auth.login-form')
        </x-layouts.auth>
    @else
        <x-layouts.auth title="Cadastro">
            @include('auth.register-form')
        </x-layouts.auth>
    @endif
@endsection
