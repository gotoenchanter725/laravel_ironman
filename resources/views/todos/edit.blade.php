@extends('layouts.dashboard_app', ['activePage' => 'todo', 'titlePage' => __('Edit Todo Task')])

@section('breadcrub_content')
<nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="{{ route('home') }}">Home</a>
    <a class="breadcrumb-item" href="{{ route('todos.index') }}">Todo Task</a>
    <span class="breadcrumb-item active">Edit task</span>
</nav>
@endsection

@section('dashboard_content')
<div class="container">
    <div class="row">
        <div class="col-md-8 m-auto">
            <form action=" {{ route('todos.update', $todo) }} " method="post" class="form-horizontal" autocomplete="off">
                @csrf
                @method('put')
            <div class="card">
                <div class="card-header bg-warning">
                    <h4 class="card-title tx-white">Edit Task</h4>
                    <p class="lead tx-white">Edit from task with description</p>
                </div>
                <div class="card-body">
                    <x-alert type="success" :message="session('todo-status')"/>
                    <div class="row">
                        <label for="" class="col-sm-2 col-form-label"> {{ __('Task Name') }} </label>
                        <div class="col-sm-7">
                            <div class="form-group {{ $errors->has('taskname') ? 'has-danger': '' }}">
                            <input type="text" name="taskname" class="form-control {{ $errors->has('taskname') ? 'is-invalid': ''}}" placeholder=" {{ __('Enter task Name/title') }}" value="{{ old('taskname', $todo->taskName ?? null) }}" required aria-required="true" id="input-taskname" >
                            @if ($errors->has('taskname'))
                                <span class="error text-danger" id="taskname-error">
                                    {{ $errors->first('taskname') }}
                                </span>
                            @endif
                            </div>
                        </div>    
                    </div>
                    <div class="row">
                        <label for="" class="col-sm-2 col-form-label"> {{ __('Task Description') }} </label>
                        <div class="col-sm-7">
                            <div class="form-group {{ $errors->has('taskdescription') ? 'has-danger': '' }}">
                            <textarea name="taskdescription" id="taskdescription-input" cols="30" rows="10" placeholder=" {{ __('Enter task description') }}" class="form-control {{ $errors->has('taskdescription') ? 'is-invalid' : '' }}" required aria-required="true">{{ old('taskdescription',$todo->taskDescription ?? null) }}</textarea>
                            @if ($errors->has('taskdescription'))
                                <span class="error text-danger" id="taskdescription-error">
                                    {{ $errors->first('taskdescription') }}
                                </span>
                            @endif
                            </div>
                        </div>    
                    </div>
                    <div class="card-footer ml-auto mr-auto">
                        <button class="btn btn-warning" type="submit"> {{ __('Update') }} </button>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection