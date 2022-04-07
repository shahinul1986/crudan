@extends('layouts.master')

@section('content')
    <br>
    <br>
    <br>

<h2>Todo Manager</h2>

<div class="container">
    <div class="row">
        @include('errors.error')
        @if (session('success'))
            <li><a href="btn btn-success">{{session('success')}}</a></li>
        @endif
        <div class="col-md-12">
            <form class="form-group" action="{{route('todolist.save')}}" method="POST">
                @csrf
                <input class="form-control" type="text" value="{{ old('name')}}" name="name" placeholder="Task Name"><br>
                <textarea class="form-control" name="task" placeholder="Details">{{ old('task')}}</textarea><br>
                <input class="btn btn-primary" type="submit" name="submit" value="Submit">
            </form>
        </div>
    </div>
</div>

<div class="container row">
    @foreach ($todos as $todo)
    <div class="col-md-3" style="border:1px solid rgb(248, 21, 21); padding:10px;">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$todo->name}}</h5>
                <p class="card-text">{{$todo->task}}</p>

                @if ($todo->status != 'complete')
                    <a href="{{route('edit.show',[$todo->id])}}" class="btn btn-primary">Edit</a>
                    <a href="{{route('todo.changeStatus',[$todo->id,'complete'])}}" class="btn btn-warning">Mark as Complete</a>
                    <a href="{{route('task.delete',[$todo->id])}}" onclick="return confirm('Are you sure');" class="btn btn-danger">Delete</a>

                @else
                    <a href="" class="btn btn-success disabled">Complete</a>

                @endif


            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="row text-center">
    {{ $todos->links()}}
   </div>

@endsection


