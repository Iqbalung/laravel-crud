@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-10">
                <h3>Sumber</h3>
            </div>
            <div class="col-md-2 text-end">
                <a class="btn btn-success" href="{{ route('source.create') }}">Tambah Sumber</a>
            </div>

        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Sumber</th>
                        <th>Domains</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sources as $source)
                        <tr>
                            <td>{{ $source->sumber }}</td>
                            <td>
                                <a href="{{ route('domain.index', ['source_id' => $source->source_id]) }}">
                                    Domains ({{ $source->domains->count() }})
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('source.destroy', $source->source_id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this source?');">
                                    <a class="btn btn-sm btn-success"
                                        href="{{ route('source.show', $source->source_id) }}">Show</a>
                                    <a class="btn btn-sm btn-warning"
                                        href="{{ route('source.edit', $source->source_id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {!! $sources->links() !!}
    </div>
@endsection
