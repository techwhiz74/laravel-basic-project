@extends('layouts.errors')

@section('styles')

@endsection

@section('content')
    <div class="row text-center align-items-center" style="height: 100vh;">
        <div class="col-12">
            <h2 class="display-1 text-secondary">
                <strong>{{ $status }}</strong>
            </h2>
            <p class="h2 text-info mb-4">
                {{ $message }}
            </p>
            <a href="{{ route('index') }}" class="text-white bg-secondary border rounded p-2">
                <i class="fas fa-home"></i>
            </a>
        </div>
    </div>
@endsection

@section('scripts')

@endsection