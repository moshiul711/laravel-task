@extends('layouts.app')

@section('main-content')
    <div class="card mt-5">
        <div class="card-header">
            <h4>
                Task Filtering
            </h4>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>##</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Tag(s)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tag->tasks as $task)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->description }}</td>
                                <td>
                                    {{ $tag->name }}
                                </td>
                                <td>
                                    {{--                                <a href="{{ route('task.view',$task->id) }}" class="btn btn-sm btn-success"><i class="fa-regular fa-eye"></i></a> --}}
                                    <a href="{{ route('task.edit', $task->id) }}" class="btn btn-sm btn-primary"><i
                                            class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="{{ route('task.delete', $task->id) }}" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are You Sure To Delete')"><i
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
