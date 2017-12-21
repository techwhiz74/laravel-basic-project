@extends('auth.layouts.backend')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs text-center">
            <h1>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                You are logged in!
            </h1>
        </div>
    </div>
</div>
@endsection
