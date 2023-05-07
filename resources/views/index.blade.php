<!DOCTYPE html>
<html>
<head>
    <title>insert cv</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
</head>
<body class="bg-gray-100 font-sans text-gray-900">
<header class="bg-white shadow-sm py-4">
    <h1 class="text-2xl font-bold text-gray-900 mx-4">
            Hello user, please fill the cv form with correct details
    </h1>
</header>
<main class="container mx-auto my-8 p-7 bg-white shadow-lg">

<form name="insert" method="post" action="{{url('cvinsert')}}" enctype="multipart/form-data">
    @csrf

{{--    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}

    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg  ">
            <div class="p-6 text-gray-900 dark:text-gray-100 items-center text-center  ">


                <br>
                name <br>
                <input class="border-solid border-2 border-sky-500" type="text" name="name" ><br>
                phone<br>
                <input  class="border-solid border-2 border-sky-500" type="text" name="phone"><br>
                email<br>
                <input class="border-solid border-2 border-sky-500" type="text" name="email"><br>
                technology<br>
                <input  class="border-solid border-2 border-sky-500" type="text" name="technology"><br>
                level<br>
                <select name="level" class="text-black">
                    <option value="Junior">Junior</option>
                    <option value="Mid">Mid</option>
                    <option value="Senior">Senior</option>
                </select>
                <br>
                salary<br>
                <input class="border-solid border-2 border-sky-500" type="text" name="salary"><br>
                experience<br>
                <input class="border-solid border-2 border-sky-500" type="text" name="experience"><br>
                document<br>
                <input  type="file" name="document"><br>

                <input  type="submit" class="inline-flex bg-green-800 text-white ">


{{--            </div>--}}
        </div>
    </div>
</form>


</div>

{{--    @error('text_field')--}}
{{--    <div class="text-red-500">{{ $message }}</div>--}}
{{--    @enderror--}}

</main>
<footer class="bg-gray-100 py-4 text-center">
    <p class="text-gray-500 text-sm">&copy;
        CV manager task for intern.</p>
</footer>
</body>
</html>
