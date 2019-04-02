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

    <a href="{{--{{route('parameters_create')}}--}}" class="btn btn-primary">+ Create document</a>

{{--
    @if(!is_null($parameters))
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
            @foreach($parameters as $parameter)
--}}
                <tr>
                    <th>{{--{{$loop->iteration}}--}}#</th>
                    <td>{{--{{$parameter->name}}--}}id</td>
                    <td>{{--@if($parameter->updated_at){{$parameter->updated_at->format('d-m-Y H:i')}}@endif--}}name</td>
                    <td>
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="{{--{{ route('parameters_show', ['id' => $parameter->id ]) }}--}}" class="btn btn-info">More info</a>
                            </div>
                        </div>
                    </td>
                </tr>
{{--
            @endforeach
--}}
            </tbody>
        </table>
   {{-- @else
        sdf
    @endif--}}
@endsection