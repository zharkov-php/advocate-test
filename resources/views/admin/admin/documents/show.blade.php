@extends('layouts.admin.index')

@section('content')

    <h1>Files: <b>{{ $document->name }}</b></h1>

    <a href="{{route('filedocs.create', ['id' => $document->id])}}" class="btn btn-primary">+ Create</a>

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
                            <a href="{{route('filedocs.edit', ['id' => $file['id']])}}" class="btn btn-dark">Edit</a>
                        </div>
                        <div class="col-xs-6">
                            <a href="{{route('filedocs.pdf', ['id' => $file['id']] )}}" class="btn btn-info">Show PDF</a>
                        </div>
                        <div class="col-xs-6">
                            <a href="{{route('filedocs.pdf_download', ['id' => $file['id']] )}}" class="btn btn-secondary">Download PDF</a>
                        </div>
                        <div class="col-xs-6">
                            <form class="form-horizontal" method="POST" accept-charset="UTF-8"
                                  enctype="multipart/form-data" action="{{route('filedocs.destroy', $file['id'])}}">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('ты уверен что хочешь удалить?')" type="submit"
                                        class="delete btn btn-danger">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
