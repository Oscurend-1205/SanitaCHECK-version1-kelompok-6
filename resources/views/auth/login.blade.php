<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SanitaCheck</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-cover bg-center bg-no-repeat relative" style="background-image: url('{{ asset('images/sanita login.png') }}');">

    <div class="absolute top-0 right-0 p-6 sm:p-8 flex items-center justify-end gap-4 z-10 w-full">
        <span class="text-gray-600 font-medium tracking-wide text-sm sm:text-base hidden sm:block drop-shadow-sm">ITSK RS dr. Soepraoen Kesdam V/BRW Malang</span>
        <img src="{{ asset('images/logoitsk.png') }}" alt="Logo ITSK" class="w-12 h-12 sm:w-14 sm:h-14 drop-shadow-md">
    </div>

    <div class="min-h-screen flex items-center px-6 sm:px-12 lg:px-24 relative z-10">
        
        <div class="bg-white/95 backdrop-blur-sm rounded-[2rem] shadow-2xl p-8 sm:p-10 w-full max-w-[420px]">
            <div class="mb-4">
                <img src="{{ asset('images/sanita logo.png') }}" alt="SanitaCheck Logo" class="w-20 h-auto">
            </div>

            <h1 class="text-[#2d6a36] text-[22px] font-bold mb-2 tracking-tight">Selamat Datang</h1>
            <p class="text-gray-500 text-[15px] mb-8 leading-relaxed font-medium">
                Silahkan masuk ke portal SanitaCheck<br>
                ITSK RS dr.Soepraoen.
            </p>

            <form action="#" method="POST" class="space-y-5">
                @csrf
                <div>
                    <input type="text" name="username" placeholder="Username" class="w-full bg-[#f1f1f1] text-gray-800 rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-[#2d6a36]/50 transition-all font-medium placeholder-gray-400">
                </div>
                <div>
                    <input type="password" name="password" placeholder="Password" class="w-full bg-[#f1f1f1] text-gray-800 rounded-2xl px-5 py-4 focus:outline-none focus:ring-2 focus:ring-[#2d6a36]/50 transition-all font-medium placeholder-gray-400">
                </div>
                
                <div class="pt-2">
                    <button type="submit" class="w-full bg-[#2d6a36] hover:bg-[#23532a] text-white font-bold rounded-2xl px-5 py-4 transition-all shadow-lg hover:shadow-xl active:scale-[0.98] text-lg">
                        Masuk
                    </button>
                </div>
            </form>
        </div>

    </div>

</body>
</html>
