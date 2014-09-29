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

	        	<?php if ($this->session->flashdata('error_upload') != '') { ?>
					<div class="alert alert-danger">
		                <p><strong>Error!</strong> Your photo is not uploaded</p>
		            </div>
		        <?php } ?>
		        <?php if ($error) { ?>
					<div class="alert alert-danger">
		                <p><strong>Error!</strong> Please check your input</p>
		            </div>
		        <?php } ?>
				<div class="widget-body">
					<!-- Tabs -->
					<div class="tabsbar-setting">
						<ul>
							<li class="active"><a href="">Profile</a></li>
							<!-- <li><a href="">Security and privacy</a></li> -->
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
									<form class="form-horizontal" id="upload" role="form" method="post" action="<?= base_url('social/setting/upload') ?>" enctype="multipart/form-data">
									  	<div class="form-group">
										    <label class="col-sm-2 control-label">Photo</label>
										    <div class="col-sm-1">
												<?php if ($user->profile_photo == null){ ?>
										    		<img src="<?= assets_url('img/avatar.jpg'); ?>" alt="" class="profile-picture pull-left">
										    	<?php }else{ ?>
										    		<img src="<?= storage_url('avatar/' . $user->profile_photo); ?>" alt="" class="profile-picture pull-left">
										    	<?php } ?>
										    </div>
										    <div class="col-sm-9">
											    <span class="btn btn-primary btn-file">
												    Choose Image <input type="file" name="photo" id="photo">
												</span>
											</div>
									  	</div>
									  	<div class="form-group">
										    <label class="col-sm-2 control-label">Cover photo</label>
										    <div class="col-sm-1">
												<?php if ($user->cover_photo == null){ ?>
										    		<img src="<?= assets_url('img/cover.jpg'); ?>" alt="" class="profile-picture pull-left">
										    	<?php }else{ ?>
										    		<img src="<?= storage_url('cover/' . $user->cover_photo); ?>" alt="" class="profile-picture pull-left">
										    	<?php } ?>
										    </div>
										    <div class="col-sm-9">
											    <span class="btn btn-primary btn-file">
												    Choose Image <input type="file" name="cover" id="cover">
												</span>
										    </div>
									  	</div>
								    </form>
									<form class="form-horizontal" role="form" method="post" action="">
									  	<div class="form-group <?php if(form_error('username') || isset($error_username)){echo "has-error";} ?>">
										    <label class="col-sm-2 control-label">Username</label>
										    <div class="col-sm-10">
												<?php echo form_error('username'); ?>
												<?php if (isset($error_username)): ?>
													<label class="control-label">
														Username not available
													</label>
												<?php endif ?>
										      	<input type="text" class="form-control" name="username" placeholder="Username" value="<?= $user->username ?>">
										    </div>
									  	</div>
									  	<div class="form-group <?php if(form_error('email') || isset($error_email)){echo "has-error";} ?>">
										    <label class="col-sm-2 control-label">Email</label>
										    <div class="col-sm-10">
												<?php echo form_error('email'); ?>
												<?php if (isset($error_email)): ?>
													<label class="control-label">
														Email has been registered
													</label>
												<?php endif ?>
										      	<input type="text" class="form-control" name="email" placeholder="Email" value="<?= $user->email ?>">
										    </div>
									  	</div>
									  	<div class="form-group <?php if(form_error('name')){echo "has-error";} ?>">
										    <label class="col-sm-2 control-label">Name</label>
										    <div class="col-sm-10">
												<?php echo form_error('name'); ?>
										      	<input type="text" class="form-control" name="name" placeholder="Name" value="<?= $user->full_name ?>">
										    </div>
									  	</div>

										<div class="form-group <?php if(form_error('gender')){echo "has-error";} ?>">
											<label class="col-sm-2 control-label">Gender</label>
											<div class="col-sm-10">
												<?php echo form_error('gender'); ?>
												<select name="gender" class="form-control">
													<option value="">Choose One</option>
													<option value="1" <?php if($user->gender == 1){echo "selected";} ?>>Male</option>
													<option value="2" <?php if($user->gender == 2){echo "selected";} ?>>Female</option>
												</select>
											</div>
										</div>
									  	<div class="form-group <?php if(form_error('country')){echo "has-error";} ?>">
										    <label class="col-sm-2 control-label">Country</label>
										    <div class="col-sm-10">
												<?php echo form_error('country'); ?>
										      	<input type="text" class="form-control" name="country" placeholder="Country" value="<?= $user->country ?>">
										    </div>
									  	</div>
									  	<div class="form-group <?php if(form_error('city')){echo "has-error";} ?>">
										    <label class="col-sm-2 control-label">City</label>
										    <div class="col-sm-10">
												<?php echo form_error('city'); ?>
										      	<input type="text" class="form-control" name="city" placeholder="City" value="<?= $user->city ?>">
										    </div>
									  	</div>
									  	<div class="form-group <?php if(form_error('website')){echo "has-error";} ?>">
										    <label class="col-sm-2 control-label">Website</label>
										    <div class="col-sm-10">
												<?php echo form_error('website'); ?>
										      	<input type="text" class="form-control" name="website" placeholder="Website" value="<?= $user->website ?>">
										    </div>
									  	</div>
									  	<div class="form-group <?php if(form_error('quote')){echo "has-error";} ?>">
										    <label class="col-sm-2 control-label">Quote</label>
										    <div class="col-sm-10">
												<?php echo form_error('quote'); ?>
										      	<input type="text" class="form-control" name="quote" placeholder="Quote" value="<?= $user->quote ?>">
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