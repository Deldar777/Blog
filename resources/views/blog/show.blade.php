@extends('layouts.app')


@section('content')
    <div class="w-4/5 m-auto text-center">
        <div class="py-15 border-b border-gray-200">
            <h1 class="text-6xl">
                {{ $post->title }}
            </h1>
        </div>
    </div>


    <div class="pt-10 sm:grid grid-cols-2 gap-20 w-4/5 mx-auto border-b border-gray-200">
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
        </div>

        <div>
            <img class="lg:max-h-80" src="/images/{{ $post->image_path }}" alt="Image">
        </div>
    </div>


@endsection
