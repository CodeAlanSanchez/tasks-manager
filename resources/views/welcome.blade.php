@extends('layouts.auth')

@section('content')
    <div class="mx-auto mt-8">
        <div class="my-4 p-4 rounded shadow max-w-md mx-auto bg-white text-center">
            <h1 class="text-2xl text-slate-800 mb-8">Welcome!</h1>
            <div class="flex flex-col flex-nowrap">
                <a href="/projects" class="underline text-blue-500 hover:text-blue-700 mb-4">Create a project to
                    get
                    started</a>
                <a href="/tasks" class="underline text-blue-500 hover:text-blue-700">Go view tasks</a>
            </div>
        </div>
    </div>
@endsection
