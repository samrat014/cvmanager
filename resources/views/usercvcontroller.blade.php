
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
                                  <label> {{$cv->document}} </label> <br>
                                    {{$cv->document}}

                                    <img src="{{asset('images/cv/' .$cv['document']) }}" width="400px" height="auto" >
                              </div>

                              <div class="flex-auto">
{{--                                    status = @if($cv->cvstatus()->status != null) {{$cv->status}}--}}
                                    status = @if($cv->status != null) {{$cv->status}}
                                              @else
                                                new user
                                              @endif

                            <form action="{{ url('updateusercv')}}" method="POST" enctype="multipart/form-data">
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
                            task assigned
                                <input type="file" name="task"><br>
                            interview date
                                <input type="date" class="text-black" name="interview_date"> <br>

                            <input type="submit">
                            </form>

                              </div>
                        </div>
                </div>
        </div>
        </div>
        </div>


</x-app-layout>
