@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
            <div class="card" id="thread-card">
                <div class="card-header">Create News Article</div>
                <div class="card-body">

                    <form method="post" action='{{ url("/admin/save-new-post") }}'>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label>Title</label>
                          <input required="required" placeholder="Enter title here" type="text" name = "title" class="form-control" value=""/>
                        </div>
                        <div class="form-group">
                            <label>Body</label>
                          <textarea name='body'class="form-control tinymce-editor">
                          </textarea>
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label>SEO Title</label>
                              <input required="required" type="text" name="seotitle" class="form-control" value=""/>
                            </div>
                            <div class="form-group">
                                <label>SEO Description</label>
                              <input required="required" type="text" name="seodescription" class="form-control" value=""/>
                            </div>
                        </div>
                        <div class="form-group">
                          <span class="input-group-btn">
                            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                              <i class="fa fa-picture-o"></i> Choose
                            </a>
                          </span>
                          <input id="thumbnail" class="form-control" type="text" name="filepath">
                        </div>
                        <img id="holder" style="margin-top:15px;max-height:100px;">
                       
                       
                        <input type="submit" name='publish' class="btn btn-success" value = "Publish"/>


                        <input type="submit" name='save' class="btn btn-default" value = "Save As Draft" />
                      </form>
                      

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>  
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script type="text/javascript">
 $('#lfm').filemanager('file');
    tinymce.init({
    selector: 'textarea.tinymce-editor',
    height: 500,
    menubar: false,
    plugins: [
      'advlist autolink lists link image charmap print preview anchor',
      'searchreplace visualblocks code fullscreen',
      'insertdatetime media table paste code help wordcount'
    ],
    toolbar: 'undo redo | formatselect | ' +
    'bold italic backcolor | alignleft aligncenter ' +
    'alignright alignjustify | bullist numlist outdent indent | ' +
    'removeformat | help, image'
  });
  
      </script>
@endsection