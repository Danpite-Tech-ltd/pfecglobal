@extends('backend.master')

@section('maincontent')
    @section('title')
        {{ env('APP_NAME') }}- Register Members
    @endsection
    <div class="mt-4 container-fluid">
        <div class="border-0 shadow-sm card">
            <div class="py-2 text-white card-header" style="background: blue;">
                <h5 class="mb-0 text-white">Register Member Lists</h5>
            </div>

            <div class="p-0 card-body">
                <div class="table-responsive">
                    <table class="table mb-0 align-middle table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Office</th>
                                <th>Destination</th>
                                <th>English Status</th>
                                <th>Funding</th>
                                <th>Date</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($contacts as $key => $contact)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ $contact->office_address }}</td>
                                    <td>
                                        <span class="badge bg-info text-dark">
                                            {{ $contact->study_destination }}
                                        </span>
                                    </td>
                                    <td>{{ $contact->english_status }}</td>
                                    <td>{{ $contact->your_studies }}</td>
                                    <td>{{ $contact->created_at->format('d M Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="p-3">
                    {{ $contacts->links('pagination::bootstrap-5') }}
                </div>

            </div>
        </div>
    </div>
    <style>
        .table td,
        .table th {
            vertical-align: middle;
            white-space: nowrap;
        }

        .badge {
            font-size: 13px;
            padding: 6px 10px;
        }

        .card {
            border-radius: 12px;
        }

        .card-header {
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }
    </style>
@endsection
