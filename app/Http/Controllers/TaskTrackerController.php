<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskTracker;

class TaskTrackerController extends Controller
{
    public function show()
    {
        $tasks = TaskTracker::orderByDesc('updated_at')->get();

        $completed = $tasks->filter(fn($task) => $task->completed)->values();
        $active = $tasks->filter(fn($task) => !$task->completed)->values();



        return response()->json([
            'all' => $tasks,
            'completed' => $completed,
            'active' => $active,
        ]);
    }

    public function addTask(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255'
        ]);

        $response = TaskTracker::create([
            'title' => $request->title,
        ]);

        return response()->json([
            'message' => "Task Created Successfully",
            'task' => $response,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255'
        ]);

        $task = TaskTracker::findOrFail($id);
        $task->update([
            'title' => $request->title,
        ]);

        return response()->json([
            'message' => "Success fully updated"
        ]);
    }

    public function toggleCompletion($id)
    {
        $task = TaskTracker::findOrFail($id);
        $task->update([
            'completed' => !$task->completed
        ]);

        return response()->json([
            'message' => "Success fully completed the task"
        ]);
    }

    public function remove($id)
    {
        $task = TaskTracker::findOrFail($id);
        $task->delete();

        return response()->json([
            'message' => "Task deleted Successfully"
        ]);
    }
}
