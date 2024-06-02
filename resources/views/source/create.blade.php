@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-row mb-3">
            <div class="col-lg-12">
                <h3>Create New Source</h3>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('source.store') }}" method="POST">
            @csrf

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="sumber">Sumber</label>
                    <input type="text" class="form-control" id="sumber" name="sumber" value="{{ old('sumber') }}"
                        required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Create Source</button>
            <a href="{{ route('source.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
