@extends('layouts.admin.index')

@section('content')
    @include('admin.admin.errors.errors')
    <button type="button" id="sidebarCollapse" class="btn btn-info">
        <i class="fas fa-align-left"></i>
        <span>Toggle Sidebar</span>
    </button>
    <h1>Dashboard</h1>
@endsection