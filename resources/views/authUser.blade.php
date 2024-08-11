@extends('components.layouts.app')

@section('content')
<x-layouts.auth>
    @if (Request::is('login'))
        @include('auth.login-form')
    @else
        @include('auth.register-form')
    @endif
</x-layouts.auth>
@endsection
