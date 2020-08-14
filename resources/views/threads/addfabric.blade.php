<!-- Modal -->
<div class="modal fade" id="addFabricModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add a new fabric</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
            </div>            <!-- Modal Body -->
            <div class="modal-body">
                <div class="container">
                <form method="POST" action="/savefabric">
                    @csrf
                <input type="hidden" name="user_id" value="{{$user->id}}"/>
                    <div  class="row">
                    <div class="form-group col">
                        <input type="text" name="brand" placeholder="brand" class="form-control" />
                        <br/>
                        <input type="text" name="type" placeholder="type*" required class="form-control" />
                        <br/>
                        <div class="container">
                            <div class="row">
                                <input type="text" name="height" id="height" required placeholder="height*" class="form-control col-sm-6"/>
                                <input type="text" name="height_measure" placeholder="cm" value="cm" readonly class="form-control col-sm-6"/>
                            </div>
                        </div>
                        <br/>
                        <input type="text" name="notes" placeholder="notes" class="form-control" />

                    </div>
                    <div class="form-group col">
                        <input type="text" name="count" placeholder="count" required class="form-control" />
                        <br/>
                        <input type="text" name="colour" placeholder="colour*" required class="form-control" />
                        <br/>
                        <div class="container">
                            <div class="row">
                                <input type="text" name="width" required placeholder="width*" class="form-control col-sm-6"/>
                                <input type="text" name="width_measure" placeholder="cm" value="cm" readonly class="form-control col-sm-6"/>
                            </div>
                        </div>
                        <br/>
                        <select name="status" class="form-control">
                            <option name="available" value="available">Available</option>
                            <option name="reserved" value="reserved">Reserved</option>
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