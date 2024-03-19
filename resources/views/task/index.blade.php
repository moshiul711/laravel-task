@extends('layouts.app')

@section('main-content')
    <div class="card mt-5">
        <div class="card-header">
            <h4>Task Management
                <a data-bs-toggle="modal" data-bs-target="#addTaskModal" class="btn btn-primary btn-sm float-end mx-2">Add Task</a>
                <a data-bs-toggle="modal" data-bs-target="#filtering" class="btn btn-primary btn-sm float-end me-5">Filte</a>
            </h4>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Tag(s)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->description }}</td>
                                <td>
                                    @if (count($task->tags) > 1)
                                        @foreach ($task->tags as $tag)
                                            {{ $tag->name . ' ,' }}
                                        @endforeach
                                    @else
                                        @foreach ($task->tags as $tag)
                                            {{ $tag->name }}
                                        @endforeach
                                    @endif

                                </td>
                                <td>
                                    {{--                                <a href="{{ route('task.view',$task->id) }}" class="btn btn-sm btn-success"><i class="fa-regular fa-eye"></i></a> --}}
                                    <a href="{{ route('task.edit', $task->id) }}" class="btn btn-sm btn-primary"><i
                                            class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="{{ route('task.delete', $task->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure To Delete')" ><i
                                            class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
