@extends('layouts.app')

@section('content')
@include('components.user-header')

<div class="container">
    <div class="row justify-content-center">
        <div class="col col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
            <div class="card" id="thread-card">
                <div class="card-header">Threads</div>
                <div class="card-body" id="thread-listing">
                    <div class="tab-menu">
                        <a class="btn btn-primary" href="/profile/{{ $user->name }}/threads">Individual Update</a>
                        <a class="btn btn-primary disabled" disabled href="/">Batch Update</a>
                    </div>
                    <form method="post" action="/stash/bulkupdate">
                        {{ csrf_field() }}

                    <div class="container">
                    <div class="row">
                    @foreach ($stash->chunk($half) as $stash)
                        <table class="col-md-6 batchtable">
                            <thead>
                                <tr>
                                    <th>Number</th>
                                    <th>Skein</th>
                                    <th>Bobbin</th>
                                    <th>Partial</th>
                                    <th>Need</th>
                                </tr>
                            </thead>
                            @foreach($stash as $thread)
                                <tr>
                                    <td>
                                        <input type="hidden" name="{{ $thread->number }}[]" value="{{ $thread->id }}"/>
                                        <input type="text" name="{{ $thread->number }}[]" value="{{ $thread->number }} - {{ $thread->brand}}"/></td>
                                    <td class="row_skein"><input type="text" name="{{ $thread->number }}[]" style="max-width:70px;text-align:center" class="skein" value="{{ $thread->skein }}"/></td>
                                    <td class="row_bobbin"><input name="{{ $thread->number }}[]" type="text" style="max-width:70px;text-align:center" class="bobbin" value="{{ $thread->bobbin }}"/></td>
                                    <td class="row_partial"><input type="text" name="{{ $thread->number }}[]" style="max-width:70px;text-align:center" class="partial" value="{{ $thread->partial }}"/></td>
                                    <td class="row_need"><input type="text" name="{{ $thread->number }}[]" style="max-width:70px;text-align:center" class="need" value="{{ $thread->need }}"/></td>
                                    </tr>
                            @endforeach
                                </table>
                        @endforeach
                        <button type="submit" class="floating-submit btn btn-success">Bulk Save</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>	    
<script src="/js/externals/responsive-tables.js"></script>
	<script>
		jQuery(document).ready(function ($) {
            $.responsiveTables();
	            $.ajaxSetup({
	                headers: {
	                    'X-CSRF-TOKEN': '{{csrf_token()}}'
	                }
	            });

                $('table').on('click', '.update_stash', function(){
                    if($('table').hasClass('searched')){
                        var d_id = $(this).attr('data-id');
                        var d_skein = $('.row_skein input').val();
                        var d_bobbin = $('.row_bobbin input').val();
                        var d_partial = $('.row_partial input').val();
                        var d_need = $('.row_need input').val();
                    }
                    else{
                        var d_id = $(this).attr('data-id');
                        var d_skein = $(this).parent('td').siblings('td').children('.skein').val();
                        var d_bobbin = $(this).parent('td').siblings('td').children('.bobbin').val();
                        var d_partial = $(this).parent('td').siblings('td').children('.partial').val();
                        var d_need = $(this).parent('td').siblings('td').children('.need').val();
                    }
                    $.ajax({
                        url: '/stash/update',
                        data: {'id': d_id, 'skein': d_skein, 'bobbin': d_bobbin, 'partial': d_partial, 'need': d_need},
                        dataType: 'json',
                        method:"POST",
                        success: function (response) {
                            Swal.fire(
                                    'Updated',        
                                    'Your stash has been updated',
                                    'success'
                                    )
                        },
                        error: function(response){
                            Swal.fire(
                                    'Sorry, an error occured',
                                    'Please report this error to the admin',
                                    'error'
                                    )
                        }
                    });
                });
	    });
	</script>
@endsection
