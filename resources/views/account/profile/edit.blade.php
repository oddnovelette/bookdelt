@extends('layouts.app')

@section('content')
    @include('account.profile._nav')

    <form method="POST" action="{{ route('account.profile.update') }}">
        @csrf
        @method('PUT')

        <div class="col-md-6">
        <div class="form-group">
            <label for="name" class="col-form-label">First Name</label>
            <input id="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $user->name) }}" required>
            @if ($errors->has('name'))
                <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="last_name" class="col-form-label">Last Name</label>
            <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name', $user->last_name) }}" required>
            @if ($errors->has('last_name'))
                <span class="invalid-feedback"><strong>{{ $errors->first('last_name') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="last_name" class="col-form-label">Skype</label>
            <input id="last_name" type="text" class="form-control{{ $errors->has('skype') ? ' is-invalid' : '' }}" name="skype" value="{{ old('skype', $user->skype) }}" required>
            @if ($errors->has('skype'))
                <span class="invalid-feedback"><strong>{{ $errors->first('skype') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <label for="phone" class="col-form-label">Contact Phone</label>
            <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone', $user->phone) }}" required>
            @if ($errors->has('phone'))
                <span class="invalid-feedback"><strong>{{ $errors->first('phone') }}</strong></span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o fa-lg"></i> Save</button>
        </div>
        </div>
    </form>
@endsection