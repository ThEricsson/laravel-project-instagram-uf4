<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pujar una imatge nova') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('postimg') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Imatge -->
                        <div>
                            <x-label for="image" :value="__('Imatge')" />
            
                            <x-input id="image" class="form-control block mt-1 w-full" type="file" name="image" :value="old('image')" required />
                        </div>
            
                        <!-- Descripció -->
                        <div>
                            <x-label for="descripcio" :value="__('Descripció')" />
            
                            <textarea id="descripcio" class="block mt-1 w-full" type="password" name="descripcio" :value="old('descripcio')" required> </textarea>
                        </div>
            
                        <div class="flex items-center justify-end mt-4">
            
                            <x-button class="ml-4">
                                {{ __('Pujar Imatge') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
