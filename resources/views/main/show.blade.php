@extends('layouts.main')

@section('content')
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route('main')}}">Documents</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled"> > File: {{ $document->name }}</a>
        </li>
    </ul><hr>
    <h1>Files: <b>{{ $document->name }}</b></h1>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($filedocs as $file)
            <tr>
                <th>{{$loop->iteration}}</th>
                <td>{{ $file['id'] }}</td>
                <td>{{ $file['name'] }}</td>
                <td>
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="{{route('main.pdf', ['id' => $file['id']] )}}" class="btn btn-info">Show
                                PDF</a>
                        </div>
                        <div class="col-xs-6">
                            <a href="{{route('main.pdf_download', ['id' => $file['id']] )}}"
                               class="btn btn-secondary">Download PDF</a>
                        </div>

                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
