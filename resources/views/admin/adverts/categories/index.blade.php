@extends('layouts.app')

@section('content')
    @include('admin.adverts.categories._nav')

    <p>
        <a href="{{ route('admin.adverts.categories.create') }}" class="btn btn-info">
            <i class="fa fa-plus"></i> Add Category
        </a>
    </p>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Slug</th>
            <th><i class="fa fa-long-arrow-up"></i><i class="fa fa-long-arrow-down"></i> Change position</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($categories as $category)
            <tr>
                <td>
                    @for ($i = 0; $i < $category->depth; $i++) &mdash; @endfor
                    <a href="{{ route('admin.adverts.categories.show', $category) }}">{{ $category->name }}</a>
                </td>
                <td>{{ $category->slug }}</td>
                <td>
                    <div class="d-flex flex-row">
                        <a class="btn btn-sm btn-secondary mr-1" href="{{ route('admin.adverts.categories.show', $category) }}"><i class="fa fa-long-arrow-left"></i> Open</a>

                        <form method="POST" action="{{ route('admin.adverts.categories.first', $category) }}" class="mr-1">
                            @csrf
                            <button class="btn btn-sm btn-secondary"><i class="fa fa-long-arrow-up"></i> First</button>
                        </form>
                        <form method="POST" action="{{ route('admin.adverts.categories.up', $category) }}" class="mr-1">
                            @csrf
                            <button class="btn btn-sm btn-secondary"><i class="fa fa-arrow-up"></i></button>
                        </form>
                        <form method="POST" action="{{ route('admin.adverts.categories.down', $category) }}" class="mr-1">
                            @csrf
                            <button class="btn btn-sm btn-secondary"><i class="fa fa-arrow-down"></i></button>
                        </form>
                        <form method="POST" action="{{ route('admin.adverts.categories.last', $category) }}" class="mr-1">
                            @csrf
                            <button class="btn btn-sm btn-secondary"><i class="fa fa-long-arrow-down"></i> Last</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection