<?php

namespace App\Services;

use App\Models\Task;
use Illuminate\Session\SessionManager;
use Log;

class TaskService
{
    protected $session;

    /**
     * Constructs a new task service object.
     *
     * @param Illuminate\Session\SessionManager $session
     */
    public function __construct(SessionManager $session)
    {
        $this->session = $session;
    }

    public function handlePrioritySwitching(int $from, int $to): void
    {
        $pair = [$from, $to];

        $num = 0;

        asort($pair);

        $tasks = Task::whereBetween('priority', $pair)
            ->oldest('priority')
            ->get();

        if ($pair[0] < $pair[1]) {
            $tasks[0]->priority = $tasks->last()->priority + 1;

            $num = -1;
        } else {
            $tasks[count($tasks) - 1]->priority = $tasks->first()->priority - 1;

            $num = 1;
        }

        foreach ($tasks as $task) {
            $task->priority = $task->priority + $num;
            $task->save();
        }
    }
}
