@extends('layouts.app')

@section('content')
<section class="medium-padding120">
	<div class="container">
		<div class="row">
			<div class="col col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
				<img src="/img/image4.png" alt="screen">
			</div>

			<div class="col col-xl-5 col-lg-5 m-auto col-md-12 col-sm-12 col-12">
				<div class="crumina-module crumina-heading">
					<h2 class="h1 heading-title">Floss, Fabrics, Patterns<br/>& Projects. Sorted. 
						</h2>
					<p class="heading-text">We are currently in beta and looking for feedback!</p>
				</div>

			

				<a href="/register" class="btn btn-primary btn-lg">
					<div class="text">
						<span class="title">Register Now</span>
					</div>
				</a>
<br/>
				<a href="/login" class="btn btn-primary btn-lg">
					<div class="text">
						<span class="sup-title">Existing Stitchers</span>
						<span class="title">Log In</span>
					</div>
				</a>
			</div>
		</div>
	</div>
</section>
<section class="about-area ptb-90">
	<div class="container">
	<div class="row">
	<div class="col-lg-12">
	<div class="sec-title center">
	<h1>Stitchtrove Features</h1>
	<p>What we can do, what we're going to do and what we want to do</p>
	</div>
	</div>
	</div>
	<div class="row mt-5">
	<div class="col-lg-4">
	<div class="single-about-box center">
		<small>&nbsp;</small>
	<h4>Inventory Management</h4>
	<p>Track your floss and fabric inventory with quick csv imports, instant updates, and printable shopping lists</p>
	</div>
	</div>
	<div class="col-lg-4">
	<div class="single-about-box center">
		<small>Coming Soon!</small>
	<h4>Pattern Storage</h4>
	<p>Upload paper patterns, store digital files and organise your pattern stash with custom filters and tags</p>
	</div>
	</div>
	<div class="col-lg-4">
	<div class="single-about-box center">
		<small>Coming Soon!</small>
	<h4>Community</h4>
	<p>Discover beautiful patterns and new designers to grow your project collection</p>
	</div>
	</div>
	</div>
	</div>
	</section>
@endsection
