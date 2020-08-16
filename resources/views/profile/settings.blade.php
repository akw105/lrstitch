@extends('layouts.app')

@section('content')
@include('components.user-header')

<div class="container">
    <div class="row justify-content-center">
        <div class="col col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
            <div class="card" id="thread-card">
                <div class="card-header">Profile settings</div>
                <div class="card-body" id="thread-listing">
                    <h3>Basics</h3>
                    <a href="/password/reset">Change Password</a><br/>
                    {{-- <a href="#">Add social media links</a> --}}
                    <br/><br/>
                    {{-- <h3>Advanced</h3> --}}
                    {{-- <p>Your subscription level: {{ $subscriptionplan }}<br/>
                    <a href="/subscription-change">Change subscription plan</a></p> --}}
                    {{-- <a href="#">Email settings</a> --}}
                    <br/><br/>
                    <h3>DANGER</h3>
                    <a href="/delete-user/{{ $user->name }}" onclick="return confirm('Are you sure you want to delete?');" class="btn btn-danger delete-user">Delete account</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
