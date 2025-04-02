<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::all();
        return view('todos.index', compact('todos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255|string',
            'completed' => 'required|boolean',
        ]);

        Todo::create($request->all());
        return redirect()->route('todos.index')->with('success', 'Todo created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $todo = Todo::findOrFail($id);
        return view('todos.show', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|max:255|string',
            'completed' => 'required|boolean',
        ]);

        $todo = Todo::findOrFail($id);
        $todo->update($request->all());
        return redirect()->route('todos.index')->with('success', 'Todo updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        return redirect()->route('todos.index')->with('success', 'Todo deleted successfully');
    }
}
