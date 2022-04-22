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
                    <form method="POST" action="{{ route('update') }}" enctype="multipart/form-data">
                        @csrf
            
                        <!-- Name -->
                        <div>
                            <x-label for="name" :value="__('Name')" />
            
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        </div>
            
                        <!-- Surname -->
                        <div>
                            <x-label for="surname" :value="__('Surname')" />
            
                            <x-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required />
                        </div>
            
                        <!-- Nick -->
                        <div>
                            <x-label for="nick" :value="__('Nick')" />
            
                            <x-input id="nick" class="block mt-1 w-full" type="text" name="nick" :value="old('nick')" required />
                        </div>
            
                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-label for="email" :value="__('Email')" />
            
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                        </div>

                        <!-- Avatar -->

                        <div class="mt-4">
                            <x-label for="avatar" :value="__('Avatar')" />
                            <img id="showactual" src="{{ route('getimage', ['filename'=>Auth::user()->image]) }}">
                            <x-input id="avatar" class="form-control block mt-1 w-full" type="file" name="avatar" :value="old('avatar')" required />
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
