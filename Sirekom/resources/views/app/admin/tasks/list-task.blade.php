@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <a href="{{ route('tasks.create') }}" class="btn btn-dark">Create New Task</a>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Tanggal Buka</th>
                <th>Type</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->judul }}</td>
                <td>{{ $task->deskripsi }}</td>
                <td>{{ $task->tanggal_buka }}</td>
                <td>{{ $task->type }}</td>
                <td>
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
