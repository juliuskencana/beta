<?php
	$follower = $this->user_model->get_count_follower($user_id->social_user_id);
	$following = $this->user_model->get_count_following($user_id->social_user_id);
?>
<div class="timeline-cover">
	<div class="cover image">
		<div class="top">
			<?php if ($user_id->cover_photo == null){ ?>
				<img src="<?= assets_url('img/cover.jpg'); ?>" class="img-responsive">
			<?php }else{ ?>
				<img src="<?= storage_url('cover/' . $user_id->cover_photo); ?>" class="img-responsive">
			<?php } ?>			
		</div>
		<?php
			if ($this->uri->segment(3) != NULL) {
				$url = $this->uri->segment(3);
			}else{
				$url = $this->session->userdata('username');
			}
		?>
		<ul class="list-unstyled">
			<li <?php if($this->uri->segment(2) == "feed"){echo " class='active'";} ?>><a href="<?= base_url('social/feed/'.$this->session->userdata('username')); ?>"><i class="fa fa-fw fa-clock-o"></i> <span>Timeline</span></a></li>
			<li <?php if($this->uri->segment(2) == "selfie"){echo " class='active'";} ?>><a href="<?= base_url('social/selfie/'.$url); ?>"><i class="fa fa-fw fa-camera"></i> <span>Selfie</span></a></li>
			<li <?php if($this->uri->segment(2) == "outfit"){echo " class='active'";} ?>><a href="<?= base_url('social/outfit/'.$url); ?>"><i class="fa fa-fw fa-child"></i> <span>Outfit of the day</span></a></li>
			<li <?php if($this->uri->segment(2) == "follower"){echo " class='active'";} ?>><a href="<?= base_url('social/follower/'.$url); ?>"><i class="fa fa-fw fa-user"></i><span> Followers </span><small>(<?= $follower ?>)</small></a></li>
			<li <?php if($this->uri->segment(2) == "following"){echo " class='active'";} ?>><a href="<?= base_url('social/following/'.$url); ?>"><i class="fa fa-fw fa-user"></i><span> Following </span><small>(<?= $following ?>)</small></a></li>
			<li <?php if($this->uri->segment(2) == "message"){echo " class='active'";} ?>><a href="<?= base_url('social/message'); ?>"><i class="fa fa-fw fa-envelope"></i> <span>Messages</span> <small>(2 new)</small></a></li>
		</ul>
	</div>
</div>
<div class="widget cover image">	
	<div class="widget-body padding-none margin-none">
		<div class="photo">
			<?php if ($user_id->profile_photo == null){ ?>
				<img src="<?= assets_url('img/avatar.jpg'); ?>" class="img-circle">
			<?php }else{ ?>
				<img src="<?= storage_url('avatar/' . $user_id->profile_photo); ?>" class="img-circle">
			<?php } ?>
		</div>
		<div class="innerAll border-right pull-left">
			<h3 class="margin-none"><?= $user_id->full_name ?></h3>
			<span><?= $user_id->country . ', ' . $user_id->city ?></span>
		</div>
		<div class="innerAll pull-left">
			<p class="lead margin-none "> <i class="fa fa-quote-left text-muted fa-fw"></i><?= $user_id->quote ?></p> 
		</div>
	</div>
	<div class="clearfix"></div>
</div>