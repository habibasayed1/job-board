<x-layout class="min-h-screen">
    <div
        class="min-h-screen w-full flex items-center justify-center bg-cover bg-center relative"
        style="background-image: url('{{ asset('images/limage.jpg') }}');"
    >
        <div class="absolute inset-0 bg-black/20"></div>

        <div class="relative z-10 w-full flex flex-col items-center">
            
            <h1 class="mb-12 text-center text-5xl font-semibold text-white tracking-wide">
                Sign in to your account
            </h1>

            <div
                class="w-full max-w-md rounded-2xl bg-white/30 backdrop-blur-xl shadow-2xl border border-white/20 p-8"
            >
            @if(session('error'))
        <div class="mb-4 text-red-600 font-medium text-sm text-center">
            {{ session('error') }}
        </div>
    @endif
                <form action="{{ route('auth.store') }}" method="POST">
                    @csrf
                    <div class="mb-6">
    <x-label for="email" :required="true">
        E-mail
    </x-label>

    <input
        type="email"
        name="email"
        required
        class="w-full rounded-xl border border-white/40 bg-white/70 px-4 py-3 text-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-400"
    />
</div>

                    
<div class="mb-6">
    <x-label for="password" :required="true">
        Password
    </x-label>

    <input
        type="password"
        name="password"
        required
        class="w-full rounded-xl border border-white/40 bg-white/70 px-4 py-3 text-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-400"
    />
</div>

                    
                    <div class="mb-6 flex items-center justify-between text-sm">
                        <label class="flex items-center gap-2 text-slate-800">
                            <input type="checkbox" name="remember" class="rounded border-slate-400">
                            Remember me
                        </label>

                        <a href="#" class="text-indigo-600 hover:underline">
                            Forget Password?
                        </a>
                    </div>
                    <button
                 type="submit"
                   class="w-full rounded-xl bg-white py-3 font-semibold text-slate-800 hover:bg-slate-100 transition"
                   >
                    Login
                </button>

               <a href="{{ route('register') }}"
               class="w-full inline-block text-center rounded-xl bg-white py-3 font-semibold text-slate-800 hover:bg-slate-100 transition mt-4">
                Create Account
                 </a>


                    
                </form>
            </div>
        </div>
    </div>
</x-layout>

