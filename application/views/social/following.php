<div class="container" style="padding-top: 68px;">

	<!-- Profile Content  -->
	<div class="row">
		<!-- timeline -->
		<div class="col-lg-9 col-md-8">
			<div class="timeline-cover">	
				<?php $this->load->view('social/cover'); ?>
			</div>
			<div class="input-group innerB">
			 	<input type="text" class="form-control " placeholder="Search contacts">
				<div class="input-group-btn"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></div>
			</div>
			<div class="row row-merge">
				<?php foreach ($following as $row): ?>
					<div class="col-md-12 col-lg-6 bg-white border-bottom">
						<div class="row">
							<div class="col-sm-9">
								<div class="media">
									<a class="pull-left margin-none" href="<?= base_url('social/selfie/'.$row->username); ?>">

										<?php if ($row->profile_photo == null){ ?>
											<img src="<?= assets_url('img/avatar.jpg'); ?>" class="pull-left media-object profile-picture">
										<?php }else{ ?>
											<img src="<?= storage_url('avatar/' . $row->profile_photo); ?>" class="img-clean profile-picture">
										<?php } ?>
									</a>
									<div class="media-body innerAll inner-2x padding-right-none padding-bottom-none">
										 <h4 class="media-heading"><a href="<?= base_url('social/selfie/'.$row->username); ?>" class="text-inverse"><?= $row->full_name ?> (@<?= $row->username ?>)</a></h4> 
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="innerAll text-right">
									<div class="btn-group-vertical btn-group-sm">
										<?php
											$check_follow = $this->user_model->check_following($this->session->userdata('user_id'), $row->social_user_id);
										?>
										<?php if ($check_follow){ ?>
											<a href="<?= base_url('social/follower/unfollow/' . $row->social_user_id); ?>" class="btn btn-followed follow-button"><i style="margin-right: 6px;" class="fa fa-minus"></i>Unfollow</a>
										<?php }else{ ?>
											<a href="<?= base_url('social/follower/follow/' . $row->social_user_id); ?>" class="btn btn-primary follow-button"><i style="margin-right: 6px;" class="fa fa-plus"></i>Follow</a>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
		</div>
		<!-- right sidebar -->
		<div class="col-md-4 col-lg-3">
			<?php $this->load->view('social/right_sidebar'); ?>
		</div>
		
	</div>

</div>