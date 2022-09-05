@extends('layouts.auth')

@section('content')
    <form method="POST" action="/projects" class="mx-auto mt-16 max-w-md flex flex-col gap-2 bg-white p-4 rounded shadow">
        @csrf
        <a href="/projects" class="text-blue-500 text-md">&#8592;projects</a>

        <h1 class="text-xl text-slate-800">Create Project</h1>
        <label for="name" class="text-md text-slate-600">Name</label>
        <input class="mb-4 rounded border-1 shadow p-4 py-2" type="text" name="name" id="name" placeholder="name">
        <button type="submit"
            class="rounded shadow-lg bg-blue-500 text-white p-4 py-2 hover:bg-blue-600 focus:outline outline-blue-300">
            Create
        </button>
    </form>
@endsection
