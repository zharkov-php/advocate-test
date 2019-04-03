@extends('layouts.main')

@section('content')
    @include('admin.admin.errors.errors')
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="#">Documents</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled"> > </a>
        </li>
    </ul>
    <h1>Documents</h1>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($documents as $document)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td>{{$document->name}}</td>
                <td>
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="{{ route('main.show', ['id' => $document->id ]) }}" class="btn btn-info">More info</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{$documents->links()}}

@endsection