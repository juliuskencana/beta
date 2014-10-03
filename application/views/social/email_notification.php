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

	        	<?php if ($this->session->flashdata('success') != '') { ?>
					<div class="alert alert-success">
		                <p><strong>Success!</strong> Your password has been changed</p>
		            </div>
		        <?php } ?>
				<div class="widget-body">
					<!-- Tabs -->
					<?= $this->load->view('social/setting_tabs'); ?>
					<!-- // Tabs END -->
					
					<div class="gallery">
						<ul class="row">
							<li class="col-md-12">
								<div class="media innerB ">
									<form class="form-horizontal" role="form" method="post" action="">
									  	<div class="form-group <?php if(form_error('opass') || isset($error_opass)){echo "has-error";} ?>">
										    <label class="col-sm-3 control-label">Email me when</label>
										    <div class="col-sm-9">
												<div class="checkbox"><label><input type="checkbox" value="1" name="like"> My post is liked by someone</label></div>
												<div class="checkbox"><label><input type="checkbox" value="1" name="share"> My post is shared by someone</label></div>
												<div class="checkbox"><label><input type="checkbox" value="1" name="comment"> My post is comments by someone</label></div>
												<div class="checkbox"><label><input type="checkbox" value="1" name="mention"> I'm followed by someone new</label></div>
												<div class="checkbox"><label><input type="checkbox" value="1" name="message"> I'm sent a message</label></div>
										    </div>
									  	</div>
									  	
									  	<div class="form-group">
									    	<div class="col-sm-offset-3 col-sm-10">
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