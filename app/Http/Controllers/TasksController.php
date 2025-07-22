<?php

namespace App\Http\Controllers;

use App\Http\Requests\AssignTask;
use App\Http\Requests\CreateTask;
use App\Http\Requests\UpdateTask;
use App\Models\Projects;
use App\Models\TaskDetails;
use App\Models\Tasks;
use App\Models\TaskType;
use App\Models\User;
use App\Models\AssignedTask;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function createTask(CreateTask $request)
    {
        $data = $request->validated();
        Tasks::create($data);
        return response()->json(['success' => true, 'message' => 'Task Created.']);
    }

    public function show()
    {
        $tasks = Tasks::all();
        $users = User::all();
        return view('frontend.pages.showTasks', compact('tasks', 'users'));
    }

    public function showTaskDetails($id)
    {
        $task = Tasks::find($id);
        $assignedTask = AssignedTask::find($id);
        return view('frontend.pages.taskDetails', compact('task', 'assignedTask'));
    }

    public function showCreateTaskForm()
    {
        $users = User::all();
        $projects = Projects::all();
        $taskTypes = TaskType::all();
        return view('frontend.pages.createTasks', compact('users', 'projects', 'taskTypes'));
    }

    public function edit($id)
    {
        $tasks = Tasks::find($id);
        $users = User::all();
        $projects = Projects::all();
        $taskTypes = TaskType::all();
        return view('frontend.pages.updateTask', compact('tasks', 'users', 'projects', 'taskTypes'));
    }

    public function update(UpdateTask $request, $id)
    {
        $tasks = Tasks::find($id);
        $data = $request->validated();
        $tasks->update($data);

        return response()->json(['success' => true, 'message' => 'Task Updated.']);
    }

    public function delete($id)
    {
        $task = Tasks::find($id);

        if ($task) {
            $task->delete();
            return response()->json(['success' => true, 'message' => 'Task deleted.']);
        } else {
            return response()->json(['success' => false, 'message' => 'Task not found.'], 404);
        }
    }

    // public function search()
    // {
    //     $tasks = Tasks::where('name', 'LIKE', '%' . request()->name . '%')->get();
    //     return view('frontend.pages.showTasks', compact('tasks'));
    // }

    // public function showAssignedTasks()
    // {
    //     $user = auth()->user();
    //     if ($user->hasRole('Developer')) {
    //         $tasks = Tasks::where('assigned_to_uid', '=', $user->id)->get();
    //     }
    //     return view('frontend.pages.showAssignedTasks', compact('tasks'));
    // }

    public function showAssignedTasks()
    {
        $user = auth()->user();

        if ($user->hasRole('Developer')) {
            // Get all task IDs assigned to this user
            $taskIds = AssignedTask::where('assigned_to_uid', $user->id)
                ->pluck('task_id');

            // Now get all tasks with those IDs
            $tasks = Tasks::whereIn('id', $taskIds)->get();
        } else {
            $tasks = collect(); // Return an empty collection
        }

        return view('frontend.pages.showAssignedTasks', compact('tasks'));
    }

    public function showAssignedTaskDetails($id)
    {
        $tasks = Tasks::find($id);
        return view('frontend.pages.assignedTaskDetails', compact('tasks'));
    }

    public function assignTask(AssignTask $request)
    {
        $data = $request->validated();

        AssignedTask::create([
            'task_id' => $data['task_id'],
            'assigned_to_uid' => $data['assigned_to_uid'],
            'assigned_by_uid' => Auth::id(),
            'time_taken' => $data['time_taken'], // Initially '0' or blank
        ]);

        return response()->json(['success' => true]);
    }

}




