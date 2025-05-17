@extends('frontend.frontend-page-master')
@section('site-title')
    {{get_static_option('members_page_'.$user_select_lang_slug.'_name')}}
@endsection
@section('page-title')
    {{get_static_option('members_page_'.$user_select_lang_slug.'_name')}}
@endsection
@section('page-meta-data')
    <meta name="description" content="{{get_static_option('testimonial_page_'.$user_select_lang_slug.'_meta_description')}}">
    <meta name="tags" content="{{get_static_option('testimonial_page_'.$user_select_lang_slug.'_meta_tags')}}">
    {!! render_og_meta_image_by_attachment_id(get_static_option('testimonial_page_'.$user_select_lang_slug.'_meta_image')) !!}
@endsection
@section('content')
    <section class="testimonial-area bg-image padding-top-110 padding-bottom-40">
        <div class="container">
            <div class="row">                                                        
                <div class="col-lg-12">
                    <div class="card margin-top-40">
                        <div class="smart-card">
                            {{-- <x-error-msg/>
                            <x-flash-msg/> --}}
                            <h4 class="title">{{ __('All Members') }}</h4>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <th>{{ __('#') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Business Name') }}</th>                                    
                                        <th>{{ __('Business Category') }}</th>                                    
                                        <!-- <th>{{ __('Action') }}</th>
                                        <th>{{ __('Change Status to') }}</th> -->
                                    </thead>
                                    <tbody>
                                        @php
                                            $startNumber = ($membersData->currentPage() - 1) * $membersData->perPage() + 1;
                                        @endphp
                                        @foreach ($membersData as $data)
                                            <tr>
                                                <td>{{ $startNumber++ }}</td>
                                                <td>{{ $data->first_name }} {{ $data->last_name }} 
                                                    @if (!empty($data->designation))
                                                        <span>({{ $data->designation }})</span>
                                                    @endif
                                                </td>
                                                <td>{{ $data->business_name }}</td>                                            
                                                <td>{{ $data->business_category }}</td>                                                        
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $membersData->links() }}
                        </div>
                    </div>
                </div>                                                    
            </div>
        </div>
    </section>
@endsection
