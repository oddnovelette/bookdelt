@extends('layouts.app')

@section('content')
    <ul class="nav nav-tabs mb-3">
        <li class="nav-item"><a class="nav-link" href="{{ route('account.home') }}">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link active" href="{{ route('account.adverts.index') }}">Adverts</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('account.profile.home') }}">Profile</a></li>
    </ul>
@endsection