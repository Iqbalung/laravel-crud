@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-row mb-3">
            <div class="col-lg-12">
                <h3>Edit Domain: {{ $domain->name }}</h3>
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

        <form action="{{ route('domain.update', $domain->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="name">Sumber</label>
                    <select name="source_id" id="source" class="form-control">
                        <option value=""></option>
                        @foreach($sources as $item)
                            <option 
                            <?php if($item->source_id == $domain->source_id) echo 'selected' ?>
                            value="{{ $item->source_id }}">{{ $item->sumber }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="name">Domain Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $domain->name }}"
                        required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="da">Domain Authority (DA)</label>
                    <input type="number" class="form-control" id="da" name="da" value="{{ $domain->da }}"
                        required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="pa">Page Authority (PA)</label>
                    <input type="number" class="form-control" id="pa" name="pa" value="{{ $domain->pa }}"
                        required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="qa">QBL</label>
                    <input type="number" class="form-control" id="qa" name="qa" value="{{ $domain->qa }}"
                        required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="os">Off-Site SEO (OS)</label>
                    <input type="number" class="form-control" id="os" name="os" value="{{ $domain->os }}"
                        required>
                </div>
            </div>

            <div class="form-row">
                
            </div>

            <div class="form-row">
               
                <div class="col-md-6 mb-3">
                    <label for="ss">Spam Score (SS)</label>
                    <input type="number" class="form-control" id="ss" name="ss" value="{{ $domain->ss }}"
                        required>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="bidding_time">Bidding End Time</label>
                    <input type="datetime-local" class="form-control" id="bidding_time" name="bidding_time"
                        value="{{ \Carbon\Carbon::parse($domain->bidding_time)->format('Y-m-d\TH:i') }}" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update Domain</button>
            <a href="{{ route('domain.show', $domain->id) }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
