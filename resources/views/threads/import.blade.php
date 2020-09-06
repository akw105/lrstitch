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
            <div class="card" id="thread-card">
                <div class="card-body" id="thread-listing">
                    <center>
                    
                        <p style="max-width: 700px">{{ $message }}</p>
                        <br/><br/>
                        <form  enctype="multipart/form-data" method="post" action='/importing-stash'>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label>Select a CSV file to import:</label>
                                <input type="file" id="uploadfile" style="max-width:300px" name="uploadfile"> 
                            </div>
                            <button type="submit" name='submit' class="btn btn-primary" value = "Import">Import</button>
                          </form>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>	
@endsection
