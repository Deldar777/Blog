@extends('layouts.app')


@section('content')
    <div class="background-image grid grid-cols-1 m-auto">
        <div class="flex text-gray-100 pt-10">
            <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block text-center">
                <h1 class="sm:text-white text-5xl uppercase font-bold text-shadow-md pb-14">
                    Do you want to become a developer?
                </h1>
                <a class="text-center bg-gray-50 text-gray-700 py-2 px-4 font-bold text-xl uppercase"  href="/blog">
                    Read More
                </a>

            </div>
        </div>
    </div>

    <div class="sm:grid grid-cols-2 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div>
            <img src="https://cdn.pixabay.com/photo/2014/09/24/14/29/macbook-459196_960_720.jpg" width="700" alt="">
        </div>

        <div class="m-auto sm:m-auto text-left w-4/5 block">
            <h2 class="text-4xl font-extrabold text-gray-600">
                Struggling to be a better web developer?
            </h2>
            <p class="py-8 text-gray-500 text-xl">
                You don’t need to be a genius or a math wiz, but an eye for detail is key.
                Computers are extremely precise, digital machines. The slightest deviation
                from what a computer expects means that code won’t compile, won’t run, or
                will crash. The whole point of programming and building software is to write
                code that the computer successfully processes, producing the desired result.
                In other words, a good Developer has to write code that works.
            </p>
            <p class="text-gray-600 text-xl pb-9">
                In addition, because the web development field evolves rapidly, mastering
                these languages is not enough. Developers need to regularly refresh and
                update their skills and knowledge.
            </p>

            <a class="uppercase bg-blue-500 text-gray-100 text-s font-extrabold py-3 px-8 rounded-3xl" href="/blog">Find Out More</a>

        </div>
    </div>

    <div class="text-center p-15 bg-black text-white">
        <h2 class="text-2xl pb-5 text-l">
            I'm an expert in ...
        </h2>
        <span class="font-extrabold block text-4xl py-1">
            UX Design
        </span>

        <span class="font-extrabold block text-4xl py-1">
            Frontend Development
        </span>

        <span class="font-extrabold block text-4xl py-1">
            Backend Development
        </span>
    </div>

    <div class="py-15 text-center">
        <span class="uppercase text-s text-gray-400">
            Blog
        </span>
        <h2 class="text-4xl font-bold py-10">
            Recent Posts
        </h2>

        <p class="m-auto w-4/5 text-gray-500">
            Our latest news, updates, and stories for developers
        </p>
    </div>


    @foreach($posts as $post)
        <div class="sm:grid grid-cols-2 w-4/5 m-auto pb-6">
            <div class="flex bg-yellow-700 text-gray-100 pt-10">
                <div class="m-auto pt-4 pb-16 sm:m-auto w-4/5 block">
                <span class="uppercase text-xs">
                    {{ $post->title }}
                </span>
                    <h3 class="text-xl font-bold py-10">
                        {{ $post->description }}
                    </h3>
                    <a class="uppercase bg-blue-500 border-2 border-gray-100 text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl" href="/blog/{{ $post->slug }}">
                        Find Out More
                    </a>
                </div>

            </div>
            <div>
                <img class="lg:max-h-80" src="/images/{{ $post->image_path }}" alt="">
            </div>
        </div>
    @endforeach


@endsection
