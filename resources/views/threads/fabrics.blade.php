@extends('layouts.app')

@section('content')
@include('components.user-header')

<div class="container">
    <div class="row justify-content-center">
        <div class="col col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
            <div class="card" id="fabric-card">
                <div class="card-header">Fabrics</div>
                <div class="card-body" id="fabric-listing">
                    <button class="btn btn-primary" data-toggle="modal"  data-backdrop="static" data-keyboard="false" data-target="#addFabricModal">Add Fabric</button>

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="hidden-sm">Brand</th>
                                <th>Type</th>
                                <th>Count</th>
                                <th>Colour</th>
                                <th>Height</th>
                                <th>Width</th>
                                <th>Status</th>
                                <th class="hidden-sm">Notes</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stash as $fabric)
                                <tr>
                                    <td class="brand">{{ $fabric->brand }}</td>
                                    <td class="type">{{ $fabric->type }}</td>
                                    <td class="count">{{ $fabric->count }}</td>
                                    <td class="colour">{{ $fabric->colour }}</td>
                                    <td class="height">{{ $fabric->height }} {{ $fabric->height_measure }}</td>
                                    <td class="width">{{ $fabric->width }} {{ $fabric->width_measure }}</td>
                                    <td class="status">{{ $fabric->status }}</td>
                                    <td class="notes">{{ $fabric->notes }}</td>
                                    <td>
                                        <button data-toggle="modal" data-target="#editFabricModal" class="edit-fabric btn btn-primary"  data-item-id="{{$fabric->id}}">Edit</button>
                                    </td>
                                    <td>
                                        <form method="POST" action="/fabric/delete/{{$fabric->id}}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                    
                                            <div class="form-group">
                                                <input type="submit" class="btn btn-danger delete-fabric" value="Delete">
                                            </div>
                                        </form>
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
@include('threads.addfabric')
@include('threads.editfabric')	    
<script src="/js/externals/responsive-tables.js"></script>
	<script>
		jQuery(document).ready(function ($) {
            $.responsiveTables();
            $('.delete-fabric').click(function(e){
                e.preventDefault() // Don't post the form, unless confirmed
                if (confirm('Are you sure?')) {
                    // Post the form
                    $(e.target).closest('form').submit() // Post the surrounding form
                }
            });
            $('.edit-fabric').click(function(e){
                $(this).addClass('edit-item-trigger-clicked'); //useful for identifying which trigger was clicked and consequently grab data from the correct row and not the wrong one.

                // var options = {
                // 'backdrop': 'static'
                // };
                // $('#addFabricModal').modal(options);
                var el = $(".edit-item-trigger-clicked"); // See how its usefull right here? 
                var row = el.parent().parent("tr");
                

                // get the data
                var id = el.data('item-id');
                var brand = row.children(".brand").text();
                var colour = row.children(".colour").text();
                var count = row.children(".count").text();
                var type = row.children(".type").text();
                var height = row.children(".height").text();
                var width = row.children(".width").text();
                var notes = row.children(".notes").text();
                var status = row.children(".status").text();
                console.log(count);

                // fill the data in the input fields
                $("input#fabric-id").attr('value', id);
                $("input#brand").attr('value', brand);
                $("input#count").attr('value', count);
                $("input#colour").attr('value', colour);
                $("input#type").attr('value', type);
                $("input#height").attr('value', height);
                $("input#width").attr('value', width);
                $("input#notes").attr('value', notes);
                if(status === 'available'){
                    $("#status").val('available');
                }
                else{
                    $("#status").val('reserved');
                }
            });

            // on modal hide
            $('#edit-modal').on('hide.bs.modal', function() {
                $('.edit-item-trigger-clicked').removeClass('edit-item-trigger-clicked')
                $("#edit-form").trigger("reset");
            });

        });
	</script>
@endsection
