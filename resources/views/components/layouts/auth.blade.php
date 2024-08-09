<div>
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <title>{{ $title ?? 'Laravel' }}</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="antialiased">
        <div class="min-h-screen bg-gray-100 text-gray-900 flex justify-center">
            <div class="max-w-screen-xl m-0 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1">
                <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
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
        </div>
    </body>
    </html>
</div>
