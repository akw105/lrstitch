@extends('layouts.app')

@section('content')
@include('components.user-header')

<div class="container">
    <div class="row justify-content-center">
        <div class="col col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
            <div class="card" id="thread-card">
                <div class="card-header">Fabrics</div>
                <div class="card-body" id="thread-listing">
                    <center>
                    
                        <h2 class="h1 heading-title">You don't have any fabrics in your inventory yet!<br/><br/>
                            Let's add some
                        </h2>
                        <br/><br/>
                        <button class="btn btn-primary btn-lg" data-toggle="modal"  data-backdrop="static" data-keyboard="false" data-target="#addFabricModal">Add Fabric</button>

                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
@include('threads.addfabric')	    
@endsection
