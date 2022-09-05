@extends('layouts.auth')

@section('content')
    <div class="mx-auto max-w-md">
        <div class="bg-white p-4 shadow rounded mb-8">
            <a href="/projects" class="text-blue-500 text-md">&#8592;projects</a>
            <h1 class="text-slate-800 text-2xl text-center mb-4">Project</h1>

            <div class="">
                <h4 class="text-lg text-slate-700">Name</h4>
                <p class="text-md  text-slate-500 mb-4">{{ $project->name }}</p>
            </div>
        </div>
        <div class="bg-white p-4 shadow rounded mb-4">
            <h2 class="text-slate-700 text-center text-2xl">Tasks</h2>
        </div>
        @if (!empty($project->tasks))
            @foreach ($project->tasks as $task)
                @include('utils.item', ['url' => 'tasks', 'item' => $task])
            @endforeach
        @else
            <div class="mt-4 p-4 rounded shadow max-w-md mx-auto bg-white">
                <p class="text-slate-700 text-md">No tasks available...</p>
            </div>
        @endif
    </div>
@endsection
