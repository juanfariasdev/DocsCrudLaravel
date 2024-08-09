@if (Request::is('login'))
    <x-layouts.auth title="Laravel - Login">
        <x-login-form />
    </x-layouts.auth>
@else
    <x-layouts.auth title="Laravel - Cadastro">
        <x-register-form />
    </x-layouts.auth>
@endif