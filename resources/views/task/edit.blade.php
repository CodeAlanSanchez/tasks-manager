@extends('layouts.auth')

@section('content')
    <form method="POST" action="/tasks/{{ $task->id }}"
        class="mx-auto mt-16 max-w-md flex flex-col gap-2 bg-white p-4 rounded shadow">
        @method('PUT')
        @csrf
        <a href="/tasks" class="text-blue-500 text-md">&#8592;tasks</a>

        <h1 class="text-xl text-slate-800">Edit Task</h1>
        <label for="name" class="text-md text-slate-600">Name</label>
        <input class="mb-4 rounded border-1 shadow p-4 py-2" type="text" name="name" id="name" placeholder="name"
            value="{{ $task->name }}">
        <label for="project" class="text-md text-slate-600">Project</label>
        <select class="mb-4 rounded border-1 shadow p-4 py-2 bg-white" name="project_id" id="project_id"
            value="{{ $task->project->id }}">
            @foreach ($projects as $option)
                <option value="{{ $option->id }}">{{ $option->name }}</option>
            @endforeach
        </select>
        <button type="submit"
            class="rounded shadow-lg bg-blue-500 text-white p-4 py-2 hover:bg-blue-600 focus:outline outline-blue-300">
            Edit
        </button>
    </form>
@endsection
