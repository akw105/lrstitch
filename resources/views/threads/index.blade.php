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

@endsection
