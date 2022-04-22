<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar perfil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('updatepass') }}">
                        @csrf

                        <!-- Contrasenya actual -->
                        <div>
                            <x-label for="oldpass" :value="__('Contrasenya actual')" />
            
                            <x-input id="oldpass" class="block mt-1 w-full" type="password" name="oldpass" :value="old('oldpass')" required />
                        </div>
            
                        <!-- Nova contrasenya -->
                        <div>
                            <x-label for="newpass" :value="__('Nova contrasenya')" />
            
                            <x-input id="newpass" class="block mt-1 w-full" type="password" name="newpass" :value="old('newpass')" required />
                        </div>
            
                        <!-- Repetir contrasenya -->
                        <div class="mt-4">
                            <x-label for="repnewpass" :value="__('Repetir contrasenya')" />
            
                            <x-input id="repnewpass" class="block mt-1 w-full" type="password" name="repnewpass" :value="old('repnewpass')" required />
                        </div>
            
                        <div class="flex items-center justify-end mt-4">
            
                            <x-button class="ml-4">
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
