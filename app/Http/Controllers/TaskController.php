<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskPostRequest;
use App\Http\Requests\TaskPriorityRequest;
use App\Http\Requests\TaskPutRequest;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use App\Services\TaskService;

class TaskController extends Controller
{
    protected $taskService;

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('task.index', ['tasks' => Task::oldest('priority')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task.create', ['projects' => Project::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskPostRequest $request)
    {
        $data = $request->validated();

        $data["priority"] = Task::getPriority();

        $task = Task::create($data);

        $task->load('project');

        return view('task.show', ['task' => $task]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $task->load('project');

        return view('task.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('task.edit', ['task' => $task, 'projects' => Project::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Requests\TaskPutRequest  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(TaskPutRequest $request, Task $task)
    {
        $data = $request->validated();

        $task->update($data);

        return view('task.show', ['task' => $task, 'project' => $task->project]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $from = $task->priority;

        $tasks = Task::whereBetween('priority', [$from, Task::max('priority')])->oldest()->get();

        $task->delete();

        foreach ($tasks as $task) {
            $task->priority = $task->priority - 1;
            $task->save();
        }

        return back();
    }

    /**
     * Update the priorities of tasks.
     *
     * @param \Illuminate\Http\Requests\TaskPriorityRequest $request
     */
    public function priority(TaskPriorityRequest $request)
    {
        ['from' => $from, 'to' => $to] = $request->validated();

        $this->taskService->handlePrioritySwitching($from, $to);
    }
}
