@extends('layouts.admin.index')

@section('content')
    <h1>Files: <b>{{ $document->name }}</b></h1>

    {{--<a href="{{route('parameters_create')}}" class="btn btn-primary">+ Create</a>--}}

    {{--
        @if(!is_null($parametersTranslations))
    --}}
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
        {{--
                    @foreach($parametersTranslations as $parametersTranslation)
        --}}
        <tr>
            <th>{{--{{$loop->iteration}}--}}#</th>
            <td>{{--{{ $document->id }}--}}id</td>
            <td>{{--{{ $document->name }}--}}name</td>
            <td>
                <div class="row">
                    <div class="col-xs-6">
                        <a href="{{--{{ route('parameters_edit', ['id' => $parametersTranslation->id ]) }}--}}" class="btn btn-info">Edit</a>
                    </div>
                </div>
            </td>
        </tr>
        {{--
                    @endforeach
        --}}
        </tbody>
    </table>

@endsection
