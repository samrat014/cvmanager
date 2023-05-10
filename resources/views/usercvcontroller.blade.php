
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User`s CV') }}
        </h2>
    </x-slot>


    <div class="py-12" >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                          <div class="flex">
                              <div class="flex-auto">
                                <label>name = </label>  <label> {{$cv->name}} </label> <br>
                                <label> technology = </label> <label> {{$cv->technology}} </label> <br>
                                  <label>phone =</label> <label>  {{$cv->phone}} </label> <br>
                                  <label> email =</label> <label>  {{$cv->email}} </label> <br>
                                  <label> technology =</label> <label>   {{$cv->technology}} </label> <br>
                                  <label> level =</label> <label>  {{$cv->level}} </label> <br>
                                  <label> salary =</label> <label>  {{$cv->salary}} </label> <br>
                                  <label> experience =</label> <label>    {{$cv->experience}} </label> <br>

                                  <label> user document =  {{$cv->document}} </label> <br>

                                    <img src="{{asset('images/cv/' .$cv['document']) }}" width="400px" height="auto" alt="document">
                              </div>

                         @if($cvstatus)

                              <div class="flex-auto">
                                interview date =
                                  @if( $cvstatus->interview_date != null )
                                      <p class="text-green-600">
                                      {{$cvstatus->interview_date}}
                                      </p>
                                      @else
                                        set the interview date
                                      <br>
                                  @endif

                                  status =
                                  @if($cvstatus->status != null)
                                      <p class="text-green-600">
                                      {{$cvstatus->status}}
                                          </p>
                                  @else
                                      new user
                                  @endif

                              </div>
                      @endif

                              <div class="flex-auto">
                                    <p class="text-green-600">


                                  update user status <br>
                                    </p>


                            <form action="{{ url('admin/updateusercv')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <input type="hidden" name="id" value="{{$cv->id}}">
                                <select name="status" class="text-black">
                                    <option value="shortlisted">shortlisted</option>
                                    <option value="First Interview">First Interview</option>
                                    <option value="second interview">second interview</option>
                                    <option value="Hired">Hired</option>
                                    <option value="Rejected">Rejected</option>
                                    <option value="Black listed">Black listed</option>
                                </select><br>
                            task assigned <br>
                                <input type="file" name="task">
                                <br>
                                <br>
                            interview date
                                <input min="<?= date('Y-m-d\TH:i'); ?>" type="datetime-local" class="text-black" name="interview_date"> <br>

{{--                                <div class="relative mb-3" >--}}
{{--                                    <input--}}
{{--                                        type="text"--}}
{{--                                        name="interview_date"--}}
{{--                                        class=" peer block min-h-[auto] w-full rounded border-0 bg-white px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"--}}
{{--                                        placeholder="Select a date" />--}}
{{--                                    <label--}}
{{--                                        for="floatingInput"--}}
{{--                                        class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[te-input-state-active]:-translate-y-[0.9rem] peer-data-[te-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-200 dark:peer-focus:text-primary">--}}
{{--                                        Select a date--}}
{{--                                    </label>--}}
{{--                                </div>--}}

                            <input type="submit">
                            </form>

                              </div>
                        </div>
                </div>
        </div>
        </div>
        </div>


</x-app-layout>
