@extends('layouts.auth')

@section('content')
    <div class="bg-white p-4 shadow rounded mx-auto max-w-md">
        <a href="/tasks" class="text-blue-500 text-md">&#8592;tasks</a>
        <h1 class="text-slate-800 text-2xl text-center mb-4">Task</h1>

        <div class="grid grid-cols-[1fr_auto]">
            <div>
                <h4 class="text-lg text-slate-700">Name</h4>
                <p class="text-md  text-slate-500 mb-4">{{ $task->name }}</p>
            </div>
            <div class="">
                <h4 class="text-lg text-slate-700">Priority</h4>
                <p class="text-md  text-slate-500 mb-4">{{ $task->priority }}</p>
            </div>
        </div>
        <div>
            <h4 class="text-lg text-slate-700">Project</h4>
            <p class="text-md text-slate-500">{{ $task->project->name }}</p>
        </div>
    </div>
@endsection
