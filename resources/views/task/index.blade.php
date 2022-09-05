@extends('layouts.auth')

@section('content')
    <div class="mx-auto mt-8">
        <h1 class="text-3xl text-center text-slate-700">Tasks</h1>
        <nav class="text-center">
            <a class="text-blue-600 hover:text-blue-800 underline text-base" href="/projects">Projects</a>
        </nav>
        <div class="my-4 p-4 rounded shadow max-w-md mx-auto bg-white flex flex-row gap-8 text-center">
            <a href="tasks/create"
                class="rounded text-xs md:text-base p-2 px-4 border-2 bg-transparent border-blue-500 text-blue-500 hover:bg-blue-500 transition-colors hover:text-white w-full">
                &#43; Create
                Task
            </a>
        </div>
        @if (!empty($tasks))
            <div class="tasks md:max-w-md mx-auto">
                @foreach ($tasks as $task)
                    @include('utils.item', ['url' => 'tasks', 'item' => $task])
                @endforeach
            </div>
        @else
            <div class="mt-4 p-4 rounded shadow max-w-md mx-auto bg-white">
                <p class="text-slate-700 text-md">No tasks available...</p>
            </div>
        @endif
    </div>
@endsection
