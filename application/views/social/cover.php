<?php
	$follower = $this->user_model->get_count_follower($user_id->social_user_id);
	$following = $this->user_model->get_count_following($user_id->social_user_id);
?>
<div class="cover">
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
		<li <?php if($this->uri->segment(2) == "message"){echo " class='active'";} ?>><a href="<?= base_url('social/message'); ?>"><i class="fa fa-fw fa-envelope"></i> <span>Messages</span> <small>(2 new)</small></a></li>
		<li <?php if($this->uri->segment(2) == "following"){echo " class='active'";} ?>><a href="<?= base_url('social/following/'.$url); ?>"><i class="fa fa-fw fa-user"></i><span> Following </span><small>(<?= $following ?>)</small></a></li>
		<li <?php if($this->uri->segment(2) == "follower"){echo " class='active'";} ?>><a href="<?= base_url('social/follower/'.$url); ?>"><i class="fa fa-fw fa-user"></i><span> Followers </span><small>(<?= $follower ?>)</small></a></li>
		<li <?php if($this->uri->segment(2) == "outfit"){echo " class='active'";} ?>><a href="<?= base_url('social/outfit/'.$url); ?>"><i class="fa fa-fw fa-camera"></i> <span>Outfit of the day</span></a></li>
		<li <?php if($this->uri->segment(2) == "selfie"){echo " class='active'";} ?>><a href="<?= base_url('social/selfie/'.$url); ?>"><i class="fa fa-fw fa-camera"></i> <span>Selfie</span></a></li>
		<li <?php if($this->uri->segment(2) == "news_feed"){echo " class='active'";} ?>><a href="<?= base_url('social/news_feed/'.$this->session->userdata('username')); ?>"><i class="fa fa-fw fa-clock-o"></i> <span>News feed</span></a></li>
	
	<div class="profile-photo-cover">
		<?php if ($user_id->profile_photo == null){ ?>
			<a href="#"><img src="<?= assets_url('img/avatar.jpg'); ?>"></a>
		<?php }else{ ?>
			<a href="#"><img src="<?= storage_url('avatar/' . $user_id->profile_photo); ?>"></a>
		<?php } ?>	
	</div>
</ul>
</div>
<div class="widget">
	<div class="widget-body padding-none margin-none">
		<div class="innerAll">
			<i class="fa fa-quote-left text-muted pull-left fa-fw"></i> 
			<p class="lead margin-none"><?= $user->quote ?></p>
		</div>
	</div>
</div>