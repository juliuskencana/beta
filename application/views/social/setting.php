<?php include 'header.php'; ?>
<div class="container" style="padding-top: 68px;">

	<!-- Profile Content  -->
	<div class="row">
		<!-- timeline -->
		<div class="col-lg-9 col-md-8">
			<div class="timeline-cover">	
				<?php $this->load->view('social/cover'); ?>
			</div>
			<div class="widget widget-gallery" data-toggle="collapse-widget">
				<div class="widget-head"><h4 class="heading">Settings</h4></div>
				<div class="widget-body">
					<!-- Tabs -->
					<div class="tabsbar-setting">
						<ul>
							<li class="active"><a href="">Profile</a></li>
							<li><a href="">Security and privacy</a></li>
							<li><a href="">Password</a></li>
							<li><a href="">Web Notifications</a></li>
							<li><a href="">Email Notifications</a></li>
							<li><a href="">Muted Accounts</a></li>
							<li><a href="">Design</a></li>
						</ul>
					</div>
					<!-- // Tabs END -->
					
					<div class="gallery">
						<ul class="row">
							<li class="col-md-12">
								<div class="media innerB ">
									<form class="form-horizontal" role="form">
									  	<div class="form-group">
										    <label class="col-sm-2 control-label">Photo</label>
										    <div class="col-sm-1">
										    	<img src="assets/img/profile_picture.jpg" alt="" class="profile-picture">
										    </div>
										    <div class="col-sm-9">
											    <span class="btn btn-primary btn-file">
												    Choose Image <input type="file" name="photo">
												</span>
											</div>
									  	</div>
									  	<div class="form-group">
										    <label class="col-sm-2 control-label">Cover photo</label>
										    <div class="col-sm-1">
										    	<img src="assets/img/cover.jpg" alt="" class="profile-picture">
										    </div>
										    <div class="col-sm-9">
											    <span class="btn btn-primary btn-file">
												    Choose Image <input type="file" name="photo">
												</span>
										    </div>
									  	</div>
									  	<div class="form-group">
										    <label class="col-sm-2 control-label">Username</label>
										    <div class="col-sm-10">
										      	<input type="text" class="form-control" placeholder="Username">
										    </div>
									  	</div>
									  	<div class="form-group">
										    <label class="col-sm-2 control-label">Email</label>
										    <div class="col-sm-10">
										      	<input type="text" class="form-control" placeholder="Email">
										    </div>
									  	</div>
									  	<div class="form-group">
										    <label class="col-sm-2 control-label">Name</label>
										    <div class="col-sm-10">
										      	<input type="text" class="form-control" placeholder="Name">
										    </div>
									  	</div>
									  	<div class="form-group">
										    <label class="col-sm-2 control-label">Country</label>
										    <div class="col-sm-10">
										      	<input type="text" class="form-control" placeholder="Country">
										    </div>
									  	</div>
									  	<div class="form-group">
										    <label class="col-sm-2 control-label">City</label>
										    <div class="col-sm-10">
										      	<input type="text" class="form-control" placeholder="City">
										    </div>
									  	</div>
									  	<div class="form-group">
										    <label class="col-sm-2 control-label">Website</label>
										    <div class="col-sm-10">
										      	<input type="text" class="form-control" placeholder="Website">
										    </div>
									  	</div>
									  	<div class="form-group">
										    <label class="col-sm-2 control-label">Quote</label>
										    <div class="col-sm-10">
										      	<input type="text" class="form-control" placeholder="Quote">
										    </div>
									  	</div>
									  	<div class="form-group">
									    	<div class="col-sm-offset-2 col-sm-10">
									    		<button type="submit" class="btn btn-primary">Save changes</button>
									   		</div>
									  	</div>
									</form>
								</div>
							</li>				
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- right sidebar -->
		<div class="col-md-4 col-lg-3">
				<?php $this->load->view('social/right_sidebar'); ?>
		</div>
		
	</div>

</div>
<?php include 'footer.php'; ?>