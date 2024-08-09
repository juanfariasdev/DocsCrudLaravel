@if (Request::is('login'))
    <x-layouts.auth title="Login">
        <x-login-form />
    </x-layouts.auth>
@else
    <x-layouts.auth title="Cadastro">
        <x-register-form />
    </x-layouts.auth>
@endif