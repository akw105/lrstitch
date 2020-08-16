@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Change your plan</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($plans as $plan)
                        <li class="list-group-item clearfix">
                            <div class="pull-left">
                                <h5>{{ $plan->name }}</h5>
                                <h5>£{{ number_format($plan->price, 2) }} monthly</h5>
                                <h5>{{ $plan->description }}</h5>
                                <a href="/subscription/change/{{ $plan->name }}" class="btn btn-outline-dark pull-right">Choose</a>
                            </div>
                        </li>
                        @endforeach
                        <li class="list-group-item clearfix">
                            <div class="pull-left">
                                <h5>Free Plan</h5>
                                <h5>£0</h5>
                                <h5>{{ $plan->description }}</h5>
                                <a href="/subscription/change/free" class="btn btn-outline-dark pull-right">Choose</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection