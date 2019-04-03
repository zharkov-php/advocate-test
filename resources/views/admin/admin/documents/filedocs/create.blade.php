@extends('layouts.admin.index')

@section('content')
{{--    @php
        dd($document->id)
    @endphp--}}
    <h1>File</h1>

    <form method="POST" action="{{ route('filedocs.store', ['id' => $documentId])}}">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" >
            <p class="help-block">* Required</p>
        </div>

        <div class="form-group">
            <label for="body">Name</label>
            <textarea type="text" rows="20" cols="45" class="form-control" id="body" name="body" ></textarea>
            <p class="help-block">* Required</p>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Сохранить
            </button>
        </div>
    </form>

@endsection
