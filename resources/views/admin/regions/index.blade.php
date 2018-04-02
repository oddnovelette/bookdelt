@extends('layouts.app')

@section('content')
    @include('admin.regions._nav')

    <p>
        <a href="{{ route('admin.regions.create') }}" class="btn btn-info">
            <i class="fa fa-plus"></i> Add Region
        </a>
    </p>

    @include('admin.regions._list', ['regions' => $regions])
@endsection