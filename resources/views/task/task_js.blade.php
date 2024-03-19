<!--Add Task Modal -->
<div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Task</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addEmployeeForm" action="{{ route('task.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <ul class="alert alert-warning @if($errors->any()) d-block @else d-none @endif" id="error">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <div class="form-group mb-3">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" required></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Tags: </label>
                        @if (count($tags) > 0)
                            @foreach ($tags as $tag)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" name="tags[]" required type="checkbox"
                                        value="{{ $tag->id }}">
                                    <label class="form-check-label" for="inlineCheckbox1">{{ $tag->name }}</label>
                                </div>
                            @endforeach
                            <a data-bs-toggle="modal" data-bs-target="#addTagModal"
                                class="btn btn-primary btn-sm float-end">Add Tag
                            </a>
                        @else
                            <a data-bs-toggle="modal" data-bs-target="#addTagModal"
                                class="btn btn-primary btn-sm float-end">Add Tag
                            </a>
                        @endif

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Task</button>
                </div>
            </form>
        </div>
    </div>
</div>





{{-- Add Tag Modal --}}
<div class="modal fade" id="addTagModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Tag</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('tag.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <ul class="alert alert-warning d-none" id="error"></ul>
                    <div class="form-group mb-3">
                        <label for="">Tag Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Tag</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- End Tag Modal --}}

{{-- Add Filtering Modal --}}
<div class="modal fade" id="filtering" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Task Filtering</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('task.filter') }}" method="post">
                @csrf
                <div class="modal-body">
                    <ul class="alert alert-warning d-none" id="error"></ul>
                    <div class="form-group mb-3">
                        <label for="">Tag Name</label>
                        <select class="form-control" name="tag_id">
                            <option selected>---Select Tag---</option>
                            @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Serach</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- End Filtering Modal --}}



<script src="{{ asset('/') }}task/js/bundle.min.js"></script>
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
@if (session('success'))
    <script>
        Command: toastr["success"]("{{ session('success') }}")
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "3000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
@endif
