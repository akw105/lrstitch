@extends('layouts.app')

@section('content')
@include('components.user-header')
<div class="container" id="printme">
    <div class="row justify-content-center">
        <div class="col col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
            <div class="card" id="thread-card">
                <div class="card-header">Shopping List</div>
                <div class="card-body" id="thread-listing">
                    <button  onclick="javascript:window.print()" class="btn-print btn btn-green">Print</button>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Number</th>
                                <th>Brand</th>
                                <th class="dontprint">Skein</th>
                                <th class="dontprint">Bobbin</th>
                                <th class="dontprint">Partial</th>
                                <th>Need</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list as $thread)
                                <tr>
                                    <td>{{ $thread->number }}</td>
                                    <td>{{ $thread->brand }}</td>
                                    <td class="row_skein dontprint">{{ $thread->skein }}</td>
                                    <td class="row_bobbin dontprint">{{ $thread->bobbin }}</td>
                                    <td class="row_partial dontprint">{{ $thread->partial }}</td>
                                    <td class="row_need">{{ $thread->need }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>	    
<script src="/js/externals/responsive-tables.js"></script>
<script>
    jQuery(document).ready(function ($) {
        $.responsiveTables();
    });
</script>
@endsection
