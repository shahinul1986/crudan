@extends('layouts.master')

@section('content')
    <br>
    <br>
    <br>

    @include('partials.slider')

    <h2>Edit</h2>

    <div class="container">
        <div class="row">
            @include('errors.error')
            @if (session('success'))
                <li><a href="btn btn-success">{{session('success')}}</a></li>
            @endif
            <div class="col-md-12">
                <form class="form-group" action="{{route('edit.save',[$task->id])}}" method="POST">
                    @csrf
                    <input class="form-control" type="text" value="{{ $task->name}}" name="name" placeholder="Task Name"><br>
                    <textarea class="form-control" name="task" placeholder="Details">{{ $task->task}}</textarea><br>
                    <input class="btn btn-primary" type="submit" name="submit" value="Submit">
                </form>
            </div>
        </div>
    </div>
@endsection

