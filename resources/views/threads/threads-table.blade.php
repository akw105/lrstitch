@extends('layouts.app')

@section('content')
@include('components.user-header')
<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<div class="h6 title">Floss Inventory</div>
				</div>
			</div>
		</div>
	</div>
</div>
@include('components.threads-tabs')
<div class="container">
    <div class="row justify-content-center">
        <div class="col col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
            <div id="thread-card">
                <div id="thread-listing">
                    <div class="">
                        @include('includes.search')
                    </div>
                    <table class="table table-bordered table-hover ui-block">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Number</th>
                                <th>Brand</th>
                                <th>Skein</th>
                                <th>Bobbin</th>
                                <th>Partial</th>
                                <th>Need</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stash as $thread)
                                <tr>
                                <td style="background-color:#{{$thread->hex}}"></td>
                                    <td>{{ $thread->number }}</td>
                                    <td>{{ $thread->brand }}</td>
                                    <td class="row_skein"><input type="text" style="max-width:70px;text-align:center" class="skein" value="{{ $thread->skein }}"/></td>
                                    <td class="row_bobbin"><input type="text" style="max-width:70px;text-align:center" class="bobbin" value="{{ $thread->bobbin }}"/></td>
                                    <td class="row_partial"><input type="text" style="max-width:70px;text-align:center" class="partial" value="{{ $thread->partial }}"/></td>
                                    <td class="row_need"><input type="text" style="max-width:70px;text-align:center" class="need" value="{{ $thread->need }}"/></td>
                                    <td><button type="button" class="update_stash btn btn-primary" 
                                        data-id="{{$thread->stash_id}}" 
                                        data-skein="{{$thread->skein}}"
                                        data-bobbin="{{$thread->bobbin}}"
                                        data-partial="{{$thread->partial}}"
                                        data-need="{{$thread->need}}"
                                        >Save</button></td>
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
	            $.ajaxSetup({
	                headers: {
	                    'X-CSRF-TOKEN': '{{csrf_token()}}'
	                }
	            });

                $('table').on('click', '.update_stash', function(){
                    var button = $(this);
                    $(button).html('Loading...');
                    $(button).removeClass('btn-primary');
                    $(button).addClass('btn-grey-lighter');
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
                        contentType: 'application/json',
                        method:"POST",
                        success: function (response) {
                            // Swal.fire(
                            //         'Updated',        
                            //         'Your stash has been updated',
                            //         'success'
                            //         )
                            $(button).removeClass('btn-grey-lighter');

                            $(button).removeClass('btn-yellow');
                            $(button).addClass('btn-green');
                            $(button).html('updated!');
                            console.log('yep');
                        },
                        error: function(response){
                            // Swal.fire(
                            //         'Sorry, an error occured',
                            //         'Please report this error to the admin',
                            //         'error'
                            //         )
                            $(button).removeClass('btn-grey-lighter');
                            $(button).addClass('btn-yellow');
                            $(button).html('ERROR!');
                            console.log(response);
                        }
                    });
                });
	    });
    </script>
    

    @endsection
