@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="form-row mb-3">
            <div class="col-lg-12">
                <h3>Domain Detail: {{ $domain->name }}</h3>
            </div>
        </div>

        <div class="form-row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">Domain Information</div>
                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $domain->name }}</p>
                        <p><strong>Source:</strong> {{ $domain->source->sumber ?? '-' }}</p>
                        <p><strong>Domain Authority (DA):</strong> {{ $domain->da }}</p>
                        <p><strong>Page Authority (PA):</strong> {{ $domain->pa }}</p>
                        <p><strong>Quality Assurance (QA):</strong> {{ $domain->qa }}</p>
                        <p><strong>Off-Site SEO (OS):</strong> {{ $domain->os }}</p>
                        <p><strong>Spam Score (SS):</strong> {{ $domain->ss }}</p>
                        <p><strong>Created At:</strong>
                            {{ \Carbon\Carbon::parse($domain->created_at)->setTimezone('Asia/Jakarta')->format('Y-m-d H:i:s') }}
                        </p>
                        <p><strong>Updated At:</strong>
                            {{ \Carbon\Carbon::parse($domain->updated_at)->setTimezone('Asia/Jakarta')->format('Y-m-d H:i:s') }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">Bidding Information</div>
                    <div class="card-body">
                        <p><strong>Bidding End Time:</strong>
                            {{ \Carbon\Carbon::parse($domain->end_time)->setTimezone('Asia/Jakarta')->format('Y-m-d H:i:s') }}
                        </p>
                        <p><strong>Remaining Time:</strong> <span id="remaining-time"></span></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-row mt-3">
            <div class="col-lg-12">
                <a href="{{ route('domain.index') }}" class="btn btn-secondary">Back to Domains</a>
                <a href="{{ route('domain.edit', $domain->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('domain.destroy', $domain->id) }}" method="POST" class="d-inline"
                    onsubmit="return confirm('Are you sure you want to delete this domain?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.34/moment-timezone-with-data.min.js"></script>
    <script>
        function diffBiddingTime(time) {
            const currentTime = moment().tz('Asia/Jakarta');
            const biddingTime = moment(time).tz('Asia/Jakarta');
            const duration = moment.duration(biddingTime.diff(currentTime));

            if (duration.asSeconds() < 0) {
                return 'Bidding has ended';
            }

            return `${duration.years()} years, ${duration.months()} months, ${duration.days()} days, ${duration.hours()} hours, ${duration.minutes()} minutes, ${duration.seconds()} seconds`;
        }

        $(document).ready(function() {
            const endTime = '{{ $domain->bidding_time }}';

            $('#remaining-time').text(diffBiddingTime(endTime));

            setInterval(function() {
                let timeDiff = diffBiddingTime(endTime);
                $('#remaining-time').text(timeDiff);
            }, 1000);
        });
    </script>
@endpush
