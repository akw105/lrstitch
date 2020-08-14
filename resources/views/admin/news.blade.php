@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
            <div class="card" id="thread-card">
                <div class="card-header">Site News</div>
                <div class="card-body">
                    <a href="/admin/new-post" class="btn btn-primary">New Article</a>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Status</th>
                            <th scope="col">Title</th>
                            <th scope="col">Date Created</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>
                                        @if($post->active == 0)
                                            Draft
                                        @else
                                            Published!
                                        @endif
                                    </td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->created_at}}</td>
                                    <td>
                                        <a href="/admin/site-news/{{$post->slug}}/edit">Edit</a>&nbsp;&nbsp;&nbsp;
                                        @if($post->active == 0)
                                            <a href="/admin/site-news/{{$post->slug}}/delete">Delete</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection