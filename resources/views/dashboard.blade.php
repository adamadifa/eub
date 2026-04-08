<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center justify-between">
                        <div>
                            <h3 class="text-lg font-medium">Selamat Datang, {{ Auth::user()->name }}!</h3>
                            <p class="text-sm text-gray-600">Anda masuk sebagai: 
                                <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                    {{ Auth::user()->hasRole('Admin') ? 'bg-red-100 text-red-800' : '' }}
                                    {{ Auth::user()->hasRole('Dosen') ? 'bg-blue-100 text-blue-800' : '' }}
                                    {{ Auth::user()->hasRole('Mahasiswa') ? 'bg-green-100 text-green-800' : '' }}
                                ">
                                    {{ Auth::user()->getRoleNames()->first() ?? 'User' }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
