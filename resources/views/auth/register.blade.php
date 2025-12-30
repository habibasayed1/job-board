<x-layout>
    <div class="min-h-screen w-screen flex items-center justify-center bg-cover bg-center relative"
         style="background-image: url('{{ asset('images/limage.jpg') }}');">

       
        <div class="absolute inset-0 bg-black/30"></div>

        <div class="relative z-10 w-full flex flex-col items-center">
            <h1 class="mb-12 text-center text-5xl font-semibold text-white drop-shadow-lg">
                
            </h1>

            <div class="w-full max-w-md rounded-2xl bg-white/30 backdrop-blur-xl shadow-2xl border border-white/20 p-8">
                <form action="{{ route('register.store') }}" method="POST">
                    @csrf

                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-slate-900">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                               class="w-full rounded-xl border border-white/40 bg-white/70 px-4 py-3 text-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-400"/>
                        @error('name')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-slate-900">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}"
                               class="w-full rounded-xl border border-white/40 bg-white/70 px-4 py-3 text-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-400"/>
                        @error('email')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-slate-900">Password</label>
                        <input type="password" name="password"
                               class="w-full rounded-xl border border-white/40 bg-white/70 px-4 py-3 text-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-400"/>
                        @error('password')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium text-slate-900">Confirm Password</label>
                        <input type="password" name="password_confirmation"
                               class="w-full rounded-xl border border-white/40 bg-white/70 px-4 py-3 text-slate-800 focus:outline-none focus:ring-2 focus:ring-indigo-400"/>
                    </div>

                    <button type="submit"
                            class="w-full rounded-xl bg-white py-3 font-semibold text-slate-800 hover:bg-slate-100 transition">
                        Register
                    </button>

                    <p class="mt-4 text-sm text-slate-800 text-center">
                        Already have an account?
                        <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Login</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</x-layout>
