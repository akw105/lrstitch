<!-- Modal -->
<div class="modal fade" id="addProjectModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add a new project</h4>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
            </div>            <!-- Modal Body -->
            <div class="modal-body">
                <div class="container">
                <form method="POST" action="/saveproject" enctype="multipart/form-data">
                    @csrf
                    <div class="form-1">
                        <div class="form-group col">
                            <label>Project name</label>
                            <input type="text" name="name" id="project_name" placeholder="name" class="form-control" />
                        </div>
                        <div class="form-group col">
                            <label>Artist</label>
                            <input type="text" name="artist" placeholder="artist" id="project_artist" class="form-control" />
                        </div>
                        <div class="form-group col">
                            <a href="#" class="btn btn-orange" id="find-projects">Next ></a>
                        </div>
                    </div>
                    <div class="form-2" style="display:none">
                        <h2 class="h3 center">Are any of these your new project?</h2>
                        <div class="container">
                            <div class="row suggestion">

                            </div>
                        </div>
                        <div class="center">
                        <a href="#" class="not-these-projects btn btn-grey">No, none of these</a>
                        </div>
                    </div>
                <div class="form-3" style="display:none">
                <input type="hidden" name="user_id" value="{{$user->id}}"/>
                    <div  class="row">
                    <div class="form-group col">
                        <input type="text" name="name" placeholder="name" required class="form-control savedname" />
                        <br/>
                        <input type="text" name="source" placeholder="source" class="form-control" />
                        <br/>
                        <select name="status" class="form-control">
                            <option name="inventory" value="inventory">Inventory</option>
                            <option name="wip" value="wip">Work In Progress</option>
                            <option name="wishlist" value="wishlist">Wishlist</option>
                        </select>
                    </div>
                    <div class="form-group col">
                        <input type="text" name="artist" placeholder="artist" required class="form-control savedartist" />
                        <br/>
                        <input type="text" name="datestart" placeholder="Date Start" class="form-control" />
                        <br/>
                        <input type="text" name="dateend" placeholder="Date End" class="form-control" />
                        <br/>
                        <div class="custom-file">
                            <input type="file" name="file" class="custom-file-input" id="chooseFile">
                            <label class="custom-file-label" for="chooseFile">Select file</label>
                        </div>
                    </div>
                </div>
                    <button type="submit" class="btn btn-orange">Save</button>
            </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"/>
<script>
jQuery(function ($) {
    $(document).on('click','#find-projects',function(e){
    e.preventDefault;
    name = $('#project_name').val();
    artist = $('#project_artist').val();
    $('.savedname').val(name);
    $('.savedartist').val(artist);
    $('.form-1').css('display','none');
    $('.form-2').css('display','block');

            $.ajax({
                url: "/project/api/autofill",
                dataType: "json",
                data: {
                    name : name,
                    artist: artist
                },
                success: function(data) {
                   console.log(data);
                   if(data.length === 0){
                    $('.form-2').css('display','none');
                    $('.form-3').css('display','block');
                   }
                   else{
                    for(var i = 0; i < data.length; i++) {
                        title=data[i]['title'];
                        id=data[i]['id'];
                        artist=data[i]['artist'];
                        if(data[i]['image'] !== null){
                            img='/uploads/projects/' + data[i]['image'];
                        }
                        else{
                            img='/img/resources/project-image-missing.png';
                        }
                        $('.suggestion').append(
                            '<div class="col-4-width center" style="padding:10px;">' + 
                            '<div class="photo-album-item" style="height: 150px; overflow:hidden">'+
                            '<div class="photo-item" style="max-height:200px;overflow:hidden"><img style="max-width:100%" src="'+ img +'" src="' + title + '" /></div></div>'+
                            '<p>' + title + '<br/>by ' + artist + '</p>' +
                            '<a href="" class="btn btn-green" data-projectid="'+id+'">Yes, this one!</a>'+
                            '</div>'
                        );
                    }
                   }
                },
                error: function(data){
                    console.log(data);
                }
            });
        });
        $(document).on('click','.not-these-projects',function(e){
            e.preventDefault;
            $('.form-2').css('display','none');
            $('.form-3').css('display','block');
        });
});
</script>