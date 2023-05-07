<x-app-layout>
    <head>
        @livewireStyles
    </head>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Search by applicant name ') }}
            <div class="float-right text-black">
                <livewire:search/>
            </div>
        </h2>
    </x-slot>

{{--    @foreach($searcheduser as $cv)--}}
{{--        <a href="showuser/{{ $cv->id }}" >--}}
{{--            <div class="py-12" >--}}
{{--                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--                        <div class="p-6 text-gray-900 dark:text-gray-100">--}}


{{--                            name =   {{$cv->name}}<br>--}}
{{--                            technology =  {{$cv->technology}}<br>--}}
{{--                            status =--}}
{{--                            @if($cv->status != null)--}}
{{--                                {{$cv->status}}--}}
{{--                            @else--}}
{{--                                new user--}}
{{--                            @endif--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </a>--}}
{{--    @endforeach--}}

    @livewireScripts

</x-app-layout>
