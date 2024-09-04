@extends('components.layouts.app')

@section('content')
<div class="max-w-screen-xl m-4 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1">
    <div class="flex flex-col w-full lg:w-2/3 xl:w-6/12 p-6 sm:p-10 min-h-[700px] gap-4">
        <div class="w-full flex justify-center">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="max-w-[200px] h-auto" />
        </div>

        <div class="flex flex-col items-center flex-1">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">Avaliação de {{ $business->user->name }}</h1>

            <!-- Formulário de Avaliação -->
            <form method="POST" action="{{ route('reviews.store', ['id_empresa' => $business->user->id]) }}"
                class="w-full">
                @csrf

                <!-- Campo de Nota (Estrelas) -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="rating">Nota</label>
                    <div class="flex items-center space-x-2">
                        @for ($i = 1; $i <= 5; $i++)
                            <input type="radio" id="rating-{{ $i }}" name="rating" value="{{ $i }}" class="hidden peer"
                                required>
                            <label for="rating-{{ $i }}"
                                class="cursor-pointer text-yellow-400 text-3xl peer-checked:text-red-400 peer-out-of-range:text-green-400">
                                <i class="fas fa-star"></i>
                            </label>
                        @endfor
                    </div>
                </div>

                <!-- Campo de Feedback -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="feedback">Feedback</label>
                    <textarea id="feedback" name="feedback" rows="4"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Escreva seu feedback..."></textarea>
                </div>

                <!-- Campos de Latitude e Longitude -->
                <x-partials.input-field type="text" name="latitude" label="Latitude" id="latitude"
                    value="{{ old('latitude') }}" placeholder="Latitude" />
                <x-partials.input-field type="text" name="longitude" label="Longitude" id="longitude"
                    value="{{ old('longitude') }}" placeholder="Longitude" />

                <!-- Mapa para Confirmação de Localização -->
                <div id="map-container" class="mb-6 h-64">
                    <div id="map" class="w-full h-full"></div>
                </div>

                <!-- Botão de Submissão -->
                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Enviar Avaliação
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- Lado direito com imagem de fundo (para telas grandes) -->
    <div class="hidden lg:flex flex-1 bg-cover bg-right bg-no-repeat"
        style="background-image: url({{ asset('images/background.png') }});">
    </div>

</div>

@endsection