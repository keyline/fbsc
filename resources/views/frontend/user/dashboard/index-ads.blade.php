@extends('frontend.user.dashboard.user-master')
@section('section')
    <div class="dashboard-form-wrapper">
        <h2 class="title">{{ __('All advertisement') }}</h2>
        <div class="card shadow bg-white rounded margin-top-40">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <th>{{ __('#') }}</th>
                        <th>{{ __('Banner') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('category') }}</th>
                        <th>{{ __('About') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Action') }}</th>
                    </thead>
                    <tbody>
                        @if (!empty($all_ads))
                            @foreach ($all_ads as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <img width="80" height="100" style="border-radius: 20px" class="avatar user-thumb"
                                            src="{{ asset($data->banner) }}" alt="{{ $data->name }}">
                                    </td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->category }}</td>
                                    <td>{{ $data->short_description }}</td>
                                    <td>
                                        @php
                                            $type = 'warning';
                                            $name = __('Inactive');
                                            if ($data->status === 1) {
                                                $type = 'success';
                                                $name = __('Active');
                                            }
                                        @endphp
                                        <span class="badge p-2 badge-{{ $type }}">{{ $name }}</span>
                                    </td>

                                    <td>
                                        <a class="btn btn-primary update-business-button"
                                            href="{{ route('edit-ads',$data->id) }}"><i class="fa fa-pencil"></i></a>
                                        <button type="button" class="btn btn-danger delete-ads"
                                            data-ad-id="{{ $data->id }}"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                {{ __('No Data Found') }}
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        {{-- delete business model --}}
        <div class="modal fade" id="confirmationAdsModal" tabindex="-1" role="dialog"
            aria-labelledby="confirmationModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmationModalLabel">Confirm Deletion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this Advertisement?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" id="confirmAdsDelete">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
