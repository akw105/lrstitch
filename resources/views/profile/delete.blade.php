@extends('layouts.app')

@section('content')
@include('components.user-header')

<div class="container">
    <div class="row justify-content-center">
        <div class="col col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
            <div class="card" id="thread-card">
                <div class="card-header">Delete Profile</div>
                <div class="card-body" id="thread-listing">
                    <h3>One last time...</h3>
                    <p>This action cannot be undone.</p><p>Once you click the button below, your account and all it's content will be permanently deleted.</p>
                    <p>We're very sorry to see you go.</p>
                    <form method="POST" action="/delete-user/{{$user->id}}">
                        {{ csrf_field() }}
                
                            <input style="max-width:200px;" type="submit" class="btn btn-danger delete-user" value="Delete">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
