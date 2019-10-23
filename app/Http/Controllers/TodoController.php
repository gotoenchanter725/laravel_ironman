<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkrole');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(auth()->user()->todos);
        // $userId = Auth::id();
        // $todos = Todo::orderBy('created_at')->where('user_id', $userId)->paginate(10);

        $todos = auth()->user()->todos()->orderBy('created_at')->paginate(10);
        return view('todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $todosValidated = $request->validate(
            [
                'taskname' => 'required|max: 100',
                'taskdescription' => 'required|min:5',
            ]
        );
        Todo::insert([
            'taskName' => $request->taskname,
            'taskDescription' => $request->taskdescription,
            'user_id' => Auth::id(),
            'taskStatus' => false,
        ]);
        $request->session()->flash('todo-status', 'New Task has been created!');
        return redirect()->route('todos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $todosValidated = $request->validate(
            [
                'taskname' => 'required|max: 100',
                'taskdescription' => 'required|min:5',
            ]
        );
        $todo->update([
            'taskName' => $request->taskname,
            'taskDescription' => $request->taskdescription,
            'taskStatus' => $todo->taskStatus,
        ]);
        $request->session()->flash('status', 'Task udapted');
        return redirect()->route('todos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->route('todos.index')->with('status', 'Task Deleted');

    }

    public function complete(Todo $todo)
    {
        $todo->update([
            'taskStatus' => !$todo->taskStatus,
        ]);
        return redirect()->back()->with('status', 'Task Completed');
    }
}
