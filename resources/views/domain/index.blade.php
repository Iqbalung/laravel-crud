@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-10">
                <h3>Domain Bidding</h3>
            </div>
            <div class="col-md-2 text-end">
                <a class="btn btn-success" href="{{ route('domain.create') }}">Tambah Domain</a>
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
                        <th>Domain</th>
                        <th>DA</th>
                        <th>PA</th>
                        <th>QBL</th>
                        <th>OS</th>
                        <th>SS</th>
                        <th>Bidding (End Time)</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($domains as $domain)
                        <tr>
                            <td>{{ $domain->sumber }}</td>
                            <td>{{ $domain->name }}</td>
                            <td>{{ $domain->da }}</td>
                            <td>{{ $domain->pa }}</td>
                            <td>{{ $domain->qa }}</td>
                            <td align="center">{{ $domain->os }}</td>
                            <td align="center">{{ $domain->ss }}</td>
                            <td>
                                <span class="domain-bidding-time-{{ $domain->id }}"></span>
                            </td>
                            <td>
                                <form action="{{ route('domain.destroy', $domain->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this domain?');">
                                    <a class="btn btn-sm btn-success"
                                        href="{{ route('domain.show', $domain->id) }}">Show</a>
                                    <a class="btn btn-sm btn-warning"
                                        href="{{ route('domain.edit', $domain->id) }}">Edit</a>
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

        {!! $domains->links() !!}
    </div>
@endsection


@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.34/moment-timezone-with-data.min.js"></script>
    <script>
        $(document).ready(function() {
            var domains = @json($domains->all());
            if (domains.length > 0) {
                domains.forEach(function(domain) {
                    $('.domain-bidding-time-' + domain.id).text(diffBiddingTime(domain.bidding_time));

                    let interval = setInterval(function() {
                        $('.domain-bidding-time-' + domain.id).text(diffBiddingTime(domain
                            .bidding_time));
                    }, 1000);
                });
            }

            function diffBiddingTime(time) {
                const currentTime = moment().tz('Asia/Jakarta');
                const biddingTime = moment(time).tz('Asia/Jakarta');
                const duration = moment.duration(biddingTime.diff(currentTime));

                if (duration.asSeconds() < 0) {
                    return 'Bidding has ended';
                }

                return `${duration.years()} years, ${duration.months()} months, ${duration.days()} days, ${duration.hours()} hours, ${duration.minutes()} minutes, ${duration.seconds()} seconds`;
            }
        });
    </script>
@endpush
