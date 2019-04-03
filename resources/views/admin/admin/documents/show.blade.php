@extends('layouts.admin.index')

@section('content')
    <h1>Document: <b>{{ $document->name }}</b></h1>


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

                <tr>
                    <th>#</th>
                    <td>id file</td>
                    <td>name file</td>
                    <td>
                        <div class="row">
                            <div class="col-xs-6">
                                <a href="#" class="btn btn-info">Edit</a>
                            </div>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>

@endsection
