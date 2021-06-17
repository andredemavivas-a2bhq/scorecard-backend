@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Created at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($scorecards as $index => $scorecard)
                                <tr>
                                    <td>{{ ++$index }}</td>
                                    <td>{{ $scorecard->username }}</td>
                                    <td>{{ $scorecard->created_at }}</td>
                                    <td>
                                        <button class="view-btn btn btn-info text-white" data-id="{{ $scorecard->id }}" type="button" data-toggle="modal" data-target="#view-Modal">
                                            <i class="far fa-eye"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No data found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.modals.view')
@push('js')
    @include('scripts.view-modal')
@endpush
@endsection
