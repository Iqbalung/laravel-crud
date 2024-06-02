@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-row mb-3">
            <div class="col-lg-12">
                <h3>Source Detail: {{ $source->sumber }}</h3>
            </div>
        </div>

        <div class="form-row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">Source Information</div>
                    <div class="card-body">
                        <p><strong>Sumber:</strong> {{ $source->sumber }}</p>
                        <p><strong>Domains:</strong> {{ $source->domains->count() }}</p>
                        <p><strong>Created At:</strong>
                            {{ \Carbon\Carbon::parse($source->created_at)->setTimezone('Asia/Jakarta')->format('Y-m-d H:i:s') }}
                        </p>
                        <p><strong>Updated At:</strong>
                            {{ \Carbon\Carbon::parse($source->updated_at)->setTimezone('Asia/Jakarta')->format('Y-m-d H:i:s') }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">Domains</div>
                    <div class="card-body">
                        <ul>
                            @foreach ($latest as $domain)
                                <li>
                                    <a href="{{ route('domain.show', $domain->id) }}">{{ $domain->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                        <a href="{{ route('domain.index', ['source_id' => $source->source_id]) }}" class="btn btn-success">
                            View All Domains
                        </a>
                        <a href="{{ route('domain.create', ['source_id' => $source->source_id]) }}" class="btn btn-primary">
                            Add Domain
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-row mt-3">
            <div class="col-lg-12">
                <a href="{{ route('source.index') }}" class="btn btn-secondary">Back to Sources</a>
                <a href="{{ route('source.edit', $source->source_id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('source.destroy', $source->source_id) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Are you sure you want to delete this source?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
