@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <a href="{{route('view.DeepWorkSession')}}" class="link-dark"><h4>View Deep Work Sessions </h4></a>
                        <i class="fa fa-address-book"></i>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
