@extends('layouts.auth')

@section('content')
    <div class="mx-auto mt-8">
        <h1 class="text-3xl text-center text-slate-700">Projects</h1>
        <nav class="text-center">
            <a class="text-blue-600 hover:text-blue-800 underline text-base" href="/tasks">Tasks</a>
        </nav>
        <div class="my-4 p-4 rounded shadow max-w-md mx-auto bg-white flex flex-row gap-8 text-center">
            <a href="projects/create"
                class="rounded text-xs md:text-base p-2 px-4 border-2 bg-transparent border-blue-500 text-blue-500 hover:bg-blue-500 transition-colors hover:text-white w-full">
                &#43; Create
                Project
            </a>
        </div>
        @if (!empty($projects))
            <div class="items md:max-w-md mx-auto">
                @foreach ($projects as $project)
                    @include('utils.item', ['url' => 'projects', 'item' => $project])
                @endforeach
            </div>
        @else
            <div class="mt-4 p-4 rounded shadow max-w-md mx-auto bg-white">
                <p class="text-slate-700 text-md">No tasks available...</p>
            </div>
        @endif
    </div>
@endsection
