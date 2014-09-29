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
		<div class="col-lg-6 pull-left">
			<div class="widget ">
				<div class="widget-body">
					<h2>Sign in</h2>
					<hr>
					<form role="form"  action="" method="post">
						<div class="form-group clearfix <?php if(form_error('username')){echo "has-error";} ?>">
							<label class="col-sm-2 control-label">Name</label>
							<div class="col-sm-10">
								<?php echo form_error('username'); ?>
								<input type="text" class="form-control" placeholder="Username" name="username">
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
						<div class="form-group">
							<label>Username</label>
							<input type="email" class="form-control" placeholder="Username" name="username">
						</div>
						<div class="form-group">
							<label>Full Name</label>
							<input type="email" class="form-control" placeholder="Full name" name="full_name">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="password" class="form-control" placeholder="Email" name="email">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" placeholder="Password" name="password">
						</div>

						<p>By clicking Sign Up, you agree to our <a href="#">Terms</a>.</p>

						<button type="submit" class="btn btn-primary text-center btn-block" name="signup">Sign up</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
