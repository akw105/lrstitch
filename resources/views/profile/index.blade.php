@extends('layouts.app')

@section('content')
@include('components.user-header')

<div class="container">
    <div class="row justify-content-center">
        <div class="col col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
            <div class="card" id="thread-card">
                <div class="card-header">My Profile</div>
                <div class="card-body" id="thread-listing">
                    <h3>Watch this space!</h3>
                    <p>More stitchy content coming soon..</p>    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
