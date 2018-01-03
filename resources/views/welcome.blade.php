@extends('layouts.app')

@section('styles')

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div class="card w-50 mx-auto">
                    <div class="card-body">
                        <h4 class="card-title">
                            <strong>@lang('app.home_label', [], app()->getLocale())</strong>
                        </h4>
                        <p class="card-text">Welcome!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection