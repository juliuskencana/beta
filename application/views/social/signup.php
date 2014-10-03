<div class="container" style="padding-top: 68px;">
	<!-- Profile Content  -->
	<div class="row">
        <?php if ($error) { ?>
			<div class="alert alert-danger">
                <p><strong>Error!</strong> Please check your input</p>
            </div>
        <?php } ?>

        <?php if ($this->session->flashdata('error') != '') { ?>
			<div class="alert alert-danger">
                <p><strong>Error!</strong> Username and Password do not match</p>
            </div>
        <?php } ?>

        <?php if ($this->session->flashdata('error_activated') != '') { ?>
			<div class="alert alert-danger">
                <p><strong>Error!</strong> Please activate your account</p>
            </div>
        <?php } ?>
		<div class="col-lg-6 pull-left">
			<div class="widget ">
				<div class="widget-body">
					<h2>Sign in</h2>
					<hr>
					<form role="form"  action="" method="post">
						<div class="form-group clearfix <?php if(form_error('username')){echo "has-error";} ?>">
							<label class="col-sm-2 control-label">Username</label>
							<div class="col-sm-10">
								<?php echo form_error('username'); ?>
								<input type="text" class="form-control" placeholder="Username" name="username" value="<?= set_value('username') ?>">
							</div>
						</div>
						<div class="form-group clearfix <?php if(form_error('password')){echo "has-error";} ?>">
							<label class="col-sm-2 control-label">Password</label>
							<div class="col-sm-10">
								<?php echo form_error('password'); ?>
								<input type="password" class="form-control" placeholder="Password" name="password">
							</div>
						</div>

						<button type="submit" class="btn btn-primary text-center btn-block" name="signin">Sign in</button>
					</form>
				</div>
			</div>
		</div>

		<div class="col-lg-6 pull-left">
			<div class="widget ">
				<div class="widget-body">
					<h2>Sign up</h2>
					<hr>
					<form role="form" action="" method="post">
						<div class="form-group clearfix <?php if(form_error('username_s') || isset($error_username)){echo "has-error";} ?>">
							<label class="col-sm-3 control-label">Username</label>
							<div class="col-sm-9">
								<?php echo form_error('username_s'); ?>
								<?php if (isset($error_username)): ?>
									<label class="control-label">
										Username not available
									</label>
								<?php endif ?>
								<input type="text" class="form-control" placeholder="Username" name="username_s" value="<?= set_value('username_s') ?>">
							</div>
						</div>
						<div class="form-group clearfix <?php if(form_error('fullname_s')){echo "has-error";} ?>">
							<label class="col-sm-3 control-label">Full Name</label>
							<div class="col-sm-9">
								<?php echo form_error('fullname_s'); ?>
								<input type="text" class="form-control" placeholder="Full name" name="fullname_s" <?php if($this->session->userdata('fullname')){echo "value='".$this->session->userdata('fullname')."'";}else{echo "value='".set_value('fullname_s')."'";} ?>>
							</div>
						</div>
						<div class="form-group clearfix <?php if(form_error('email_s')){echo "has-error";} ?>">
							<label class="col-sm-3 control-label">Email</label>
							<div class="col-sm-9">
								<?php echo form_error('email_s'); ?>
								<input type="text" class="form-control" placeholder="Email" name="email_s" <?php if($this->session->userdata('email')){echo "value='".$this->session->userdata('email')."'";}else{echo "value='".set_value('email_s')."'";} ?>>
							</div>
						</div>
						<div class="form-group clearfix <?php if(form_error('gender_s')){echo "has-error";} ?>">
							<label class="col-sm-3 control-label">Gender</label>
							<div class="col-sm-9">
								<?php echo form_error('gender_s'); ?>
								<select name="gender_s" class="form-control">
									<option value="">Choose One</option>
									<option value="1">Male</option>
									<option value="2">Female</option>
								</select>
							</div>
						</div>
						<div class="form-group clearfix <?php if(form_error('password_s')){echo "has-error";} ?>">
							<label class="col-sm-3 control-label">Password</label>
							<div class="col-sm-9">
								<?php echo form_error('password_s'); ?>
								<input type="password" class="form-control" placeholder="Password" name="password_s" <?php if($this->session->userdata('password')){echo "value='".$this->session->userdata('password')."'";} ?>>
							</div>
						</div>

						<p>By clicking Sign Up, you agree to our <a href="#">Terms</a>.</p>

						<button type="submit" class="btn btn-primary text-center btn-block" name="signup">Sign up</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
