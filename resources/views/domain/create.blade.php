@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-row mb-3">
            <div class="col-lg-12">
                <h3>Create New Domain</h3>
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

        <form action="{{ route('domain.store') }}" method="POST">
            @csrf

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="name">Sumber</label>
                    <select name="source_id" id="source" class="form-control">
                        <option value=""></option>
                        @foreach($sources as $item)
                            <option value="{{ $item->source_id }}">{{ $item->sumber }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="name">Domain Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                        required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="da">Domain Authority (DA)</label>
                    <input type="number" class="form-control" id="da" name="da" value="{{ old('da') }}"
                        required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="pa">Page Authority (PA)</label>
                    <input type="number" class="form-control" id="pa" name="pa" value="{{ old('pa') }}"
                        required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="qa">QBL</label>
                    <input type="number" class="form-control" id="qa" name="qa" value="{{ old('qa') }}"
                        required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="os">Off-Site SEO (OS)</label>
                    <input type="number" class="form-control" id="os" name="os" value="{{ old('os') }}"
                        required>
                </div>
            </div>

            <div class="form-row">
                
                <div class="col-md-6 mb-3">
                    <label for="ss">Spam Score (SS)</label>
                    <input type="number" class="form-control" id="ss" name="ss" value="{{ old('ss') }}"
                        required>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="bidding_time">Bidding End Time</label>
                    <input type="datetime-local" class="form-control" id="bidding_time" name="bidding_time"
                        value="{{ old('bidding_time') }}" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Create Domain</button>
            <a href="{{ route('domain.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
