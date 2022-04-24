
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Inici') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl sm:px-6 lg:px-8 maincontent-custom">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 bg-white border-b border-gray-200">
                    @if(!empty($data) && $data->count())

                        @foreach($data as $value)

                            <div class="m-2 rounded overflow-hidden shadow-lg custom-card content-center">
                                <div class="mb-2 inline-block"><img class="imageavatar" src="{{ route('getimage', ['filename'=>$value->user->image]) }}"><span class="inline-block">{{$value->user->name}} {{$value->user->surname}} </span><span style="color: grey; fonts-size: 5px;">|   {{ '@'.$value->user->nick }}</span></div>
                                <img src="{{ route('getimageposts', ['filename'=>$value->image_path]) }}" class="card-img-top">
                                <div class="px-6 py-4">
                                    <p class="text-gray-700 text-base">
                                        <p style="color: grey; fonts-size: 5px;">{{ '@'.$value->user->nick . ' | ' . \FormatTime::LongTimeFilter($value->created_at)}}</p>
                                        <p class="card-text">{{ $value->description }}</p>
                                    </p>
                                </div>
                            </div>

                        @endforeach

                    @else

                        <tr>

                            <td colspan="10">No hi ha publicacions.</td>

                        </tr>

                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
