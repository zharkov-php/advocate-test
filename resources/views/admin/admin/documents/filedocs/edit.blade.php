@extends('layouts.admin.index')

@section('content')

    <h1>File</h1>

    <form method="post" action="{{ route('filedocs.update', $file->id)}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$file->name}}">
            <p class="help-block">* Required</p>
        </div>

        <div class="form-group">
            <label for="body">Text</label>
            <input type="text" rows="20" cols="45" class="form-control" id="body" name="body" value="{{$file->body}}">
            <p class="help-block">* Required</p>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </form>

@endsection
