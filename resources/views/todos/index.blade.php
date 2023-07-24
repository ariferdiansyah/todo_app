@extends('layouts.app')


@section('styles')
    <style>
        #outer {
            text-align: center;
        }

        .inner {
            display: inline-block;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (Session::has('alert-success'))
                            <div class="alert alert-success" role="alert">
                                {{ Session::get('alert-success') }}
                            </div>
                        @endif
                        <a href="{{ route('todos.create') }}" class="btn btn-sm btn-info">Add Todo</a>
                        @if (Session::has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ Session::get('error') }}
                            </div>
                        @endif
                        @if (count($todos) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Completed</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($todos as $todo)
                                        <tr>
                                            <td>{{ $todo->title }}</td>
                                            <td>{{ $todo->description }}</td>
                                            <td>
                                                @if ($todo->is_completed == 0)
                                                    <a class="btn btn-sm btn-danger" href="#"
                                                        role="button">Pending</a>
                                                @else
                                                    <a class="btn btn-sm btn-success" href="#"
                                                        role="button">Completed</a>
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-success"
                                                    href="{{ route('todos.show', $todo->id) }}" role="button">View</a>
                                                <a class="btn btn-sm btn-info" href="{{ route('todos.edit', $todo->id) }}"
                                                    role="button">Edit</a>
                                                <form action="{{ route('todos.destroy') }}" method="POST" class="inner">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="todo_id" value="{{ $todo->id }}">
                                                    <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <h4>Not Available Todo</h4>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
