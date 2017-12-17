@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">@lang('app.home_label', [], app()->getLocale())</div>

                <div class="panel-body">
                    Welcome!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
