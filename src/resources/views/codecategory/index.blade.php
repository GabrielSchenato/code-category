@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif


                    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Create Category</a>
                    <a href="{{ route('admin.categories.deleted') }}" class="btn btn-dark btn-sm">Deleted Categories</a>
                    <br>
                    <br>
                    <hr>

                    <h4>Categories</h4>


                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Parent</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->parent_id }}</td>
                                <td>{{ $category->active ? 'Yes' : 'No' }}</td>
                                <td>
                                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-outline-primary">Edit category</a>
                                    {!! Form::model($category, ['route' => ['admin.categories.destroy', $category->id], 'method' => 'delete', 'style' => 'display: inline;']) !!}
                                        {!! Form::submit('Delete category', ['class' => 'btn btn-outline-danger']) !!}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
