@extends('components.layouts.app')

@section('content')
<div class="max-w-screen-2xl m-0 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1">
    <div class="flex flex-col w-full lg:w-2/3 xl:w-6/12 p-4 sm:p-8 min-h-[700px] h-auto gap-4 justify-center">
        <div class="w-full flex justify-center max-h-[30%]">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="max-w-[300px] h-auto w-auto" />
        </div>
        <div class="flex flex-col items-center">
            <div class="w-full flex-1">
                {{ $slot }}
            </div>
        </div>
    </div>
    <div class="flex-1 bg-primary text-center hidden lg:flex bg-cover bg-no-repeat bg-right"
        style="background-image: url({{ asset('images/background.png') }});">
        <div class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat">
        </div>
    </div>
</div>
@endsection