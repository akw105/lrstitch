@extends('layouts.app')

@section('content')
@include('components.user-header')

<div class="container">
    <div class="row justify-content-center">
        <div class="col col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
            
            <div class="tab-pane" id="album-page">

                <div class="photo-album-wrapper">

                    <div class="photo-album-item-wrap col-4-width">
							
                        <div class="photo-album-item create-album" data-mh="album-item" style="height: 350px;">
                        
                            <a href="#" data-toggle="modal" data-target="#create-photo-album" class="  full-block"></a>
                        
                            <div class="content">
                        
                                <a href="#" class="btn btn-control bg-primary" data-toggle="modal" data-target="#create-photo-album">
                                    <svg class="olymp-plus-icon"><use xlink:href="#olymp-plus-icon"></use></svg>
                                </a>
                                <br/>
                                <a href="#" class="h3" data-toggle="modal"  data-backdrop="static" data-keyboard="false" data-target="#addProjectModal">Add a Project</a>
                                <span class="sub-title">It only takes a few moments!</span>
                        
                            </div>
                        
                        </div>
                    </div>
                    <!-- end first one -->
                    @foreach($stash as $project)
                    <div class="photo-album-item-wrap col-4-width">
							
							
                        <div class="photo-album-item" data-mh="album-item" style="height: 350px;">
                            <div class="photo-item" style="max-height:200px;overflow:hidden">
                                @if(is_null($project->image))
                                    <img src="/img/resources/project-image-missing.png" alt="project photo missing">
                                @else
                                
                                    <img src="{{ '/uploads/projects/'.$project->image }}" alt="photo">
                                @endif
                            </div>
                        
                            <div class="content">
                                <a href="#" class="title h5">{{ $project->title }}</a>
                                <span class="sub-title">{{$project->artist}}</span>
                                <span class="sub-title status-{{$project->status}}">{{ $project->status }}</span>
                            </div>
                        
                        </div>
                    </div>
                    @endforeach

                </div>
            
            </div>

        </div>
    </div>
</div>
@include('projects.addproject')	 
@endsection
