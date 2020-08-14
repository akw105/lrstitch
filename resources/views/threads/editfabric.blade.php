<!-- Modal -->
<div class="modal fade" id="editFabricModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit fabric</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
            </div>            <!-- Modal Body -->
            <div class="modal-body">
                <div class="container">
                <form method="POST" action="/updatefabric">
                    @csrf
                <input type="hidden" name="user_id" value="{{$user->id}}"/>
                <input type="hidden" name="fabric_id" id="fabric-id" value=""/>
                    <div  class="row">
                    <div class="form-group col">
                        <label>Brand</label>
                        <input type="text" name="brand" id="brand" placeholder="brand" class="form-control" />
                        <br/>
                        <label>Type*</label>
                        <input type="text" name="type" id="type" placeholder="type" value="" required class="form-control" />
                        <br/>
                        <label>Height*</label>
                        <div class="container">
                            
                            <div class="row">
                                
                                <input type="text" value="" name="height" id="height" required placeholder="height*" class="form-control col-sm-6"/>
                                <input type="text" name="height_measure" placeholder="cm" value="cm" readonly class="form-control col-sm-6"/>
                            </div>
                        </div>
                        <br/>
                        <label>Notes</label>
                        <input type="text" value="" name="notes" id="notes" placeholder="notes" class="form-control" />

                    </div>
                    <div class="form-group col">
                        <label>Count*</label>
                        <input type="text" value="" name="count" id="count" placeholder="count" required class="form-control" />
                        <br/>
                        <label>Colour*</label>
                        <input type="text" value="" name="colour" id="colour" placeholder="colour*" required class="form-control" />
                        <br/>
                        <label>Width*</label>
                        <div class="container">
                            
                            <div class="row">
                                
                                <input type="text" value="" name="width" id="width" required placeholder="width*" class="form-control col-sm-6"/>
                                <input type="text" name="width_measure" placeholder="cm" value="cm" readonly class="form-control col-sm-6"/>
                            </div>
                        </div>
                        <br/>
                        <label>Status</label>
                        <select name="status" class="form-control" id="status">
                            <option id="available" name="available" value="available">Available</option>
                            <option id="reserved" name="reserved" value="reserved">Reserved</option>
                        </select>
                    </div>
                </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>