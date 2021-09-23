@extends('layouts.app')


@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl">
                Blog Posts
            </h1>
        </div>
    </div>


    @if( session()->has('message'))
        <div class="w-4/5 m-auto mt-10 pl-2">
            <p class="w-1/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4">
                {{ session()->get('message') }}
            </p>
        </div>
    @endif

    @if (Auth::check())
        <div class="pt-15 w-4/5 m-auto">
            <a class="bg-blue-500 uppercase bg-transparent text-gray-100 text-sm font-extrabold mt-4 py-3 px-5 rounded-3xl"
               href="/blog/create">
                Create a post
            </a>
        </div>
    @endif

    @foreach($posts as $post)
        <div class="pt-10 sm:grid grid-cols-2 gap-20 w-4/5 mx-auto border-b border-gray-200">
            <div>
                <img class="lg:max-h-80" src="/images/{{ $post->image_path }}" alt="Image">
            </div>

            <div>
                <h2 class="text-gray-700 font-bold text-5xl pb-4">
                   {{ $post->title }}
                </h2>
                <span class=" text-gray-500">
                By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->created_at)) }}
            </span>
                <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
                    {{ $post->description }}
                </p>

                <a href="/blog/{{ $post->slug }}" class="uppercase bg-blue-500 text-gray-100 font-extrabold py-4 px-8 mr-1 rounded-3xl" >
                    Keep Reading
                </a>

                @if(Auth::id() == $post->user_id)
                    <a href="/blog/{{ $post->slug }}/edit" class="uppercase bg-blue-500 text-gray-100 font-extrabold py-4 px-8 rounded-3xl" >
                        Edit Post
                    </a>
                @endif

                @if(Auth::id() == $post->user_id)
                    <form
                        action="/blog/{{ $post->slug }}"
                        method="POST">
                        @csrf
                        @method('delete')

                        <button
                            class="text-red-500 pr-3 float-right"
                            type="submit">
                            Delete
                        </button>

                    </form>
                @endif
            </div>
        </div>
    @endforeach

@endsection
