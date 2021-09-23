@extends('layouts.app')


@section('content')

    <div class="w-4/5 m-auto text-left">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl">
                Create Post
            </h1>
        </div>
    </div>

    <div class="w-4/5 m-auto pt-20">

        <form action="/blog"
              method="post"
              enctype="multipart/form-data">
            @csrf
            <input type="text"
                   name="title"
                   placeholder="Title..."
                   class="bg-gray-0 block border-b-2 w-full h-20 text-6xl outline-none">

            <textarea
                name="description"
                placeholder="Description..."
                class="text-white py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none">
            </textarea>

            <div>
                <input class="pt-10"
                       type="file"
                       id="myFile"
                       name="image">
            </div>


            <button type="submit"
                    class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">
                submit post
            </button>

        </form>

    </div>
@endsection
