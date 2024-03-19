@extends('layouts.app')

@section('main-content')
    <div class="card mt-5">
        <div class="card-header">
            <h4>
                Task Edit Form
            </h4>
        </div>

        <div class="card-body">
            <form id="addEmployeeForm" action="{{ route('task.update', $task->id) }}" method="post">
                @csrf
                <div class="modal-body">
                    <ul class="alert alert-warning @if($errors->any()) d-block @else d-none @endif" id="error">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <div class="form-group mb-3">
                        <label for="">Title</label>
                        <input type="text" value="{{ $task->title }}" required name="title" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Description</label>
                        <textarea name="description" required class="form-control">{{ $task->description }}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Tags: </label>
                        @foreach ($tags as $tag)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input"
                                       {{ $task->tags->contains($tag->id) ? 'checked' : '' }}
                                       name="tags[]" type="checkbox" required
                                       value="{{ $tag->id }}">
                                <label class="form-check-label" for="inlineCheckbox1">{{ $tag->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary">Update Task</button>
                </div>
            </form>
        </div>
    </div>
@endsection
