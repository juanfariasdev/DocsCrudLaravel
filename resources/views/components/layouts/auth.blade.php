@extends('components.layouts.app')

@section('content')
<div class="max-w-screen-xl m-0 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1">
    <div class="lg:w-2/3 xl:w-6/12 p-6 sm:p-12">
        <div>
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-mx-auto" />
        </div>
        <div class="mt-12 flex flex-col items-center">
            <div class="w-full flex-1 mt-8">
                {{ $slot }}
            </div>
        </div>
    </div>
    <div class="flex-1 bg-green-100 text-center hidden lg:flex">
        <div class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat"
             style="background-image: url({{ asset('images/code.png') }});">
        </div>
    </div>
</div>
@endsection
