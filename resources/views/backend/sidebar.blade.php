<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<a href="{{ URL::route('home')}}">
						<div class="user">
							<div class="avatar-sm float-left mr-2">
								<img src="{{ route('get-asset', ['images', 'no-user.png']) }}" alt="{{ \Auth::user()->name }}" class="avatar-img rounded-circle">
							</div>
							<div class="info" >
								<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
									<span>
										{{ \Auth::user()->name }}
										<span class="user-level">{{ \App\GroupModel::where('id', \App\UserDetailsModel::where('user_id', \Auth::user()->id)->first()->group_id)->first()->group_alias }}</span>
										<span class="caret"></span>
									</span>
								</a>
								<div class="clearfix"></div>

								<div class="collapse in" id="collapseExample">
									<ul class="nav">
										<li>
											<a href="{{ route('change-my-details-get') }}">
												<span class="link-collapse">Edit Profile</span>
											</a>
										</li>
										<li>
											<a href="{{ route('change-my-password-get') }}">
												<span class="link-collapse">Change Password</span>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
				</a>
					<ul class="nav nav-primary">
						<li class="nav-item">
							<a  href="{{ URL::route('home')}}" >
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>	
						<li class="nav-item">
							<a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
								<i class="fas fa-bars"></i>
								<p>Home Page</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="dashboard">
								<ul class="nav nav-collapse">
									<li class="nav-item nav-item-dashboard">
										<a href="{{ URL::route('admin-slider-list')}}">
											<i class="far fa-file"></i>						
											<p>Slider</p>
										</a>
									</li>
									<li class="nav-item nav-item-dashboard">
										<a href="{{ URL::route('admin-service-list')}}">
											<i class="far fa-file"></i>						
											<p>Services</p>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#events" class="collapsed" aria-expanded="false">
								<i class="fas fa-bars"></i>
								<p>Pages</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="events">
								<ul class="nav nav-collapse">
									<li class="nav-item nav-item-dashboard">
										<a href="{{ URL::route('admin-blog-list')}}">
											<i class="far fa-file"></i>						
											<p>Blogs</p>
										</a>
									</li>
									<li class="nav-item nav-item-dashboard">
										<a href="{{ URL::route('admin-events-list')}}">
											<i class="far fa-file"></i>						
											<p>Events</p>
										</a>
									</li>
									<li class="nav-item nav-item-dashboard">
										<a href="{{ URL::route('admin-our-team-list')}}">
											<i class="far fa-file"></i>						
											<p>Our Team</p>
										</a>
									</li>
									<li class="nav-item nav-item-dashboard">
										<a href="{{ URL::route('admin-portfolio-list')}}">
											<i class="far fa-file"></i>						
											<p>Portfolio</p>
										</a>
									</li>
								</ul>
							</div>

						</li>
						<li class="nav-item active">
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->