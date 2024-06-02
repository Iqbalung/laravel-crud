@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-row mb-3">
            <div class="col-lg-12">
                <h3>Edit Source: {{ $source->sumber }}</h3>
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

        <form action="{{ route('source.update', $source->source_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="sumber">Sumber</label>
                    <input type="text" class="form-control" id="sumber" name="sumber" value="{{ $source->sumber }}"
                        required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update Source</button>
            <a href="{{ route('source.show', $source->source_id) }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
