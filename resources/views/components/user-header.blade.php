<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block">
				<div class="top-header">
					<div class="top-header-thumb">
					</div>
					<div class="profile-section">
						<div class="row">
							<div class="col col-lg-5 col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">
									<li>
										<a href="/profile/{{ $user->name }}/threads">Thread Stash</a>
									</li>
									<li>
										<a href="/profile/{{ $user->name }}/fabrics">Fabric Stash</a>
									</li>
									<li>
										<a href="#" title="coming soon!"><strike>Projects</strike></a> <!-- /profile/{{ $user->name }}/projects -->
									</li>
								</ul>
							</div>
							<div class="col col-lg-5 ml-auto col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">
									<li>
										<a href="#" title="coming soon!"><strike>Wish List</strike></a> <!-- /profile/{{ $user->name }}/wishlist -->
									</li>
									<li>
										<a href="/profile/{{ $user->name }}/shopping-list">Shopping List</a>
									</li>
									<li>
										<a href="/profile/{{$user->name}}/edit-profile">Edit Profile</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="top-header-author">
						<a href="#" class="author-thumb">
							<img src="/img/profiles/{{ $user->initials() }}.png" alt="author">
						</a>
						<div class="author-content">
							<a href="#" class="h4 author-name">{{ $user->name }}</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>