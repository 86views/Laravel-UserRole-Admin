<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks =  Task::with('user')->orderBy('due_date')->get();

        return view('admin.tasks.index', compact('tasks'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create',  Task::class);
        return view('admin.tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create',  Task::class); 
        Task::create($request->only('name', 'due_date'));
        return  redirect()->route('admin.tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $this->authorize('update',  $task);
        return view('admin.tasks.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $this->authorize('update',  $task);
        $task->update($request->only('name', 'due_date'));
        return  redirect()->route('admin.tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $this->authorize('delete',  $task);
        $task->delete();
        return  redirect()->route('admin.tasks.index');
    }
}
