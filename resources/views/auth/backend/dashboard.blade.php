@extends('auth.layouts.backend')

@section('styles')

@endsection

@section('content')
    <div class="row">
        <div class="col text-center">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card w-50 mx-auto">
                <div class="card-body">
                    <h4 class="card-title">
                        <strong>@lang('backend.dashboard_label', [], app()->getLocale())</strong>
                    </h4>
                    <p class="card-text">You are logged in!</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection