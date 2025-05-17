@extends('frontend.user.dashboard.user-master')
@section('section')
    <div class="dashboard-form-wrapper">
        <h2 class="title">{{ __('Create advertisement') }}</h2>
        <div class="card shadow bg-white rounded margin-top-20">
            <div class="card-body p-3">
                <form method="POST" action="{{ route('update-ads') }}" enctype="multipart/form-data">
                    @csrf
                    
                     <input type="hidden" name="id" value="{{ $ads->id }}">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $ads->name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="name">Category</label>
                        <select class="form-control form-control"
                        id="category" name="category" value="{{ $ads->category }}"
                        >
                        <option value="">Select Category</option>
                        <option value="Member Offers" {{ $ads->category == "Member Offers" ? 'selected' : '' }}>Member Offers</option>
                        <option value="Social Updates" {{ $ads->category == "Social Updates" ? 'selected' : '' }}>Social Updates</option>
                        <option value="Cultural Updates" {{ $ads->category == "Cultural Updates" ? 'selected' : '' }}>Cultural Updates</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="short_description">Short Description</label>
                        <textarea class="form-control" id="short_description" name="short_description" rows="2" required>{{ $ads->short_description }}
                        </textarea>
                    </div>

                    <div class="form-group">
                        <label for="title">{{__('Status')}}</label>
                        <select class="form-control" name="status">
                            <option value="0" {{ $ads->status == "0" ? 'selected' : '' }}>{{__('Inactive')}}</option>
                            <option value="1" {{ $ads->status == "1" ? 'selected' : '' }}>{{__('Active')}}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="banner">Banner Image</label>
                        <input type="file" class="form-control-file" onchange="displayImg(this,$(this))" id="adds_banner" name="banner" required>
                        <input type="hidden" name="old_banner" value="{{ $ads->banner }}">
                    </div>

                    <div class="form-group" id="ads_show">
                        <img id="ads_img" width="200" height="300" style="border-radius: 20px" class="avatar user-thumb" src="{{ asset($ads->banner) }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
