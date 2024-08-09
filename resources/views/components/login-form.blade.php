<div class="flex flex-col items-center">
    <h1 class="text-2xl font-bold">Entrar</h1>
</div>

<div class="mx-auto max-w-xs mt-8">
    <input
        class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
        type="email" placeholder="E-mail" />

    <div class="relative mt-5 w-full">
        <input
            id="password"
            class="w-full px-8 py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
            type="password" placeholder="Senha" />
        <span
            id="togglePassword"
            class="absolute inset-y-0 right-3 flex items-center cursor-pointer w-5">
            <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                width="1280.000000pt" height="755.000000pt" viewBox="0 0 1280.000000 755.000000"
                preserveAspectRatio="xMidYMid meet">
                <metadata>
                Created by potrace 1.15, written by Peter Selinger 2001-2017
                </metadata>
                <g transform="translate(0.000000,755.000000) scale(0.100000,-0.100000)"
                fill="#000000" stroke="none">
                <path d="M6085 7544 c-280 -20 -371 -28 -500 -45 -1333 -173 -2702 -778 -3954
                -1747 -706 -547 -1342 -1222 -1542 -1638 -106 -220 -116 -379 -32 -527 135
                -240 665 -809 1193 -1283 890 -797 1896 -1440 2860 -1826 614 -246 1197 -391
                1830 -454 241 -25 850 -25 1095 0 776 77 1496 289 2262 668 851 420 1700 1032
                2464 1776 457 444 903 961 1006 1166 35 69 35 73 30 161 -10 181 -99 338 -388
                686 -122 146 -588 617 -774 780 -720 634 -1441 1125 -2215 1508 -885 439
                -1720 685 -2585 761 -121 11 -657 21 -750 14z m695 -704 c785 -69 1554 -300
                2370 -710 977 -490 1957 -1234 2669 -2025 79 -88 231 -279 231 -290 0 -28
                -328 -400 -571 -649 -1429 -1464 -3087 -2354 -4574 -2456 -88 -6 -205 -14
                -260 -19 -106 -8 -381 1 -605 19 -1532 125 -3178 986 -4704 2460 -217 210
                -606 641 -606 672 0 36 191 290 357 474 659 734 1686 1478 2653 1922 795 365
                1529 559 2315 612 152 10 560 5 725 -10z"/>
                <path d="M6175 5909 c-610 -99 -1089 -390 -1436 -872 -179 -250 -290 -518
                -346 -837 -26 -149 -26 -530 0 -680 39 -223 96 -397 192 -586 260 -514 730
                -895 1310 -1063 741 -214 1557 9 2105 575 141 145 276 331 315 432 23 61 35
                153 29 218 -6 54 -2 73 30 165 105 295 138 585 101 886 -75 605 -440 1162
                -963 1470 -251 148 -541 246 -831 282 -122 16 -436 22 -506 10z"/>
                </g>
                </svg>
        </span>
    </div>

    <button
        class="mt-5 tracking-wide font-semibold bg-green-400 text-white-500 w-full py-4 rounded-lg hover:bg-green-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
        <span class="ml-2">Entrar</span>
    </button>

    <div class="mt-6 text-center">
        <a href="/register" class="text-sm text-gray-600 hover:underline">
            Não tem uma conta? Cadastre-se aqui
        </a>
    </div>
</div>

<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function (e) {
        // Alterna o tipo de input de "password" para "text" e vice-versa
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        
        // Alterna o ícone (opcional)
        this.classList.toggle('text-gray-900');
    });
</script>
