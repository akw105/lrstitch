@extends('layouts.app')

@section('content')
@include('components.user-header')

<div class="container">
    <div class="row justify-content-center">
        <div class="col col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
            <div class="card" id="thread-card">
                <div class="card-header">No Access</div>
                <div class="card-body" id="thread-listing">
                    <center>
                    
                        <h2>Sorry, this users inventory is private.</h2>

                    </center>
                </div>
            </div>
        </div>
    </div>
</div>	    
@endsection
