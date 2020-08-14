@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
            <div class="card" id="thread-card">
                <div class="card-header">Upload new threads</div>
                <div class="card-body">

                    <form  enctype="multipart/form-data" method="post" action='{{ url("/admin/importing-threads") }}'>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label>File</label>
                            <input type="file" id="uploadfile" name="uploadfile"> 
                        </div>
                        <button type="submit" name='submit' class="btn btn-primary" value = "Import">Import</button>
                      </form>
                      

                </div>
            </div>
        </div>
    </div>
</div>

@endsection