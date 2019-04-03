@extends('layouts.admin.index')

@section('content')
    <h1>Document</h1>

    <form method="POST" action="{{ route('documents.store') }}">
        @csrf
        @method('POST')
        <div class="form-group">
            <div class="form-group">
                <label for="name">Имя документа</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <p class="help-block">* Required</p>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Create
            </button>
        </div>
    </form>

@endsection
