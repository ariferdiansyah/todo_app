@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Todos App</div>

                    <div class="card-body">
                        <h4>Edit Todos</h4>
                        <a href="{{ url()->previous() }}" class="btn mb-3 btn-sm btn-info">Go Back</a> <br>
                        <form action="{{ route('todos.update') }}" method="POST" class="form-control">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="todo_id" value={{ $todo->id }}>
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" name="title" value={{ $todo->title }} class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea cols="5" rows="5" name="description" class="form-control">{{ $todo->description }} </textarea>
                            </div>
                            <div class="mb-3">
                                <label for="">Status</label>
                                <select name="is_completed" id="" class="form-control">
                                    <option disabled selected>Select Option</option>
                                    <option value="1">Completed</option>
                                    <option value="0">Pending</option>
                                </select>

                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
