@extends('layouts.app')

@section('content')
    <ul class="nav nav-tabs mb-3">
        <li class="nav-item"><a class="nav-link active" href="{{ route('admin.home') }}">Adminpanel</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.users.index') }}">Users</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.regions.index') }}">Regions</a></li>
    </ul>
@endsection