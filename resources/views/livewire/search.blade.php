<div>


    <input type="text" wire:model="search" placeholder="Search cv" >

    @if(!empty($search))

    @if($searcheduser->count() > 0 )


        @foreach($searcheduser as $cv)
        <a href="showuser/{{ $cv->id }}" >
            <div class="py-12" >
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">

                            name =   {{$cv->name}}<br>
                            technology =  {{$cv->technology}}<br>
                            status =
                            @if($cv->status != null)
                                {{$cv->status}}
                            @else
                                new user
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </a>
    @endforeach


    @else
            <div class="py-12" >
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                    no user found
                        </div>
                        </div>
                        </div>
                        </div>
    @endif
    @endif

</div>

