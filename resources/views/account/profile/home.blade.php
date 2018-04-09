@extends('layouts.app')

@section('content')
    @include('account.profile._nav')

    <div class="col-md-6">
    <div class="mb-3">
        <a href="{{ route('account.profile.edit') }}" class="btn btn-info btn-sm">
            <i class="fa fa-pencil"></i> Edit
        </a>
    </div>

    <table class="table table-striped table-bordered">
        <tbody>
        <tr>
            <th>First Name</th><td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>Last Name</th><td>{{ $user->last_name }}</td>
        </tr>
        <tr>
            <th>Email</th><td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>Skype</th><td>{{ $user->skype }}</td>
        </tr>
        <tr>
            <th>Phone</th><td>{{ $user->phone }}</td>
        </tr>
        </tbody>
    </table>
    <div>
@endsection