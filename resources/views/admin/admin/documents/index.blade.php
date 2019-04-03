@extends('layouts.admin.index')

@section('content')
    @include('admin.admin.errors.errors')

    <button type="button" id="sidebarCollapse" class="btn btn-info">
        <i class="fas fa-align-left"></i>
        <span>Toggle Sidebar</span>
    </button>


    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="#">Documents</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled"> > </a>
        </li>
    </ul>


    <h1>Documents</h1>

    <a href="{{route('documents.create')}}" class="btn btn-primary">+ Create document</a>

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
            @foreach($documents as $document)
                <tr>
                    <th>{{$loop->iteration}}</th>
                    <td>{{$document->id}}</td>
                    <td>{{$document->name}}</td>
                    <td>
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="{{ route('documents.show', ['id' => $document->id ]) }}" class="btn btn-info">More info</a>
                            </div>
                            <div class="col-xs-6">
                                <form class="form-horizontal" method="POST" accept-charset="UTF-8" enctype="multipart/form-data" action="{{route('documents.destroy', $document->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('ты уверен что хочешь удалить?')" type="submit" class="delete btn btn-danger">
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

    {{$documents->links()}}

@endsection