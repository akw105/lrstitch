@extends('layouts.app')

@section('content')
@include('components.user-header')

<div class="container">
    <div class="row justify-content-center">
        <div class="col col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
            <div class="mt-5" id="thread-card">
                <div class="" id="thread-listing">
                    <center>
                    
                        <h2 class="h1 heading-title">You don't have any projects in your inventory yet!<br/><br/>
                            Let's add some
                        </h2>
                        <br/><br/>
                        <button class="btn btn-orange btn-lg" data-toggle="modal"  data-backdrop="static" data-keyboard="false" data-target="#addProjectModal">Add a Project</button>

                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
@include('projects.addproject')	 
@endsection
