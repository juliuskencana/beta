<div class="cover">
	<div class="top">
		<?php if ($user->cover_photo == null){ ?>
			<img src="<?= assets_url('img/cover.jpg'); ?>" class="img-responsive">
		<?php }else{ ?>
			<img src="<?= storage_url('cover/' . $user->cover_photo); ?>" class="img-responsive">
		<?php } ?>			
	</div>
	<ul class="list-unstyled">
		<li <?php if($this->uri->segment(2) == "news_feed"){echo " class='active'";} ?>><a href="<?= base_url('social/news_feed'); ?>"><i class="fa fa-fw fa-pencil"></i> <span>News feed</span></a></li>
		<li <?php if($this->uri->segment(2) == "timeline"){echo " class='active'";} ?>><a href="<?= base_url('social/timeline'); ?>"><i class="fa fa-fw fa-clock-o"></i> <span>Timeline</span></a></li>
		<li <?php if($this->uri->segment(2) == "outfit"){echo " class='active'";} ?>><a href="<?= base_url('social/outfit'); ?>"><i class="fa fa-fw fa-camera"></i> <span>Outfit of the day</span> <small>(102)</small></a></li>
		<li <?php if($this->uri->segment(2) == "follower"){echo " class='active'";} ?>><a href="<?= base_url('social/follower'); ?>"><i class="fa fa-fw fa-user"></i><span> Followers </span><small>(19)</small></a></li>
		<li <?php if($this->uri->segment(2) == "following"){echo " class='active'";} ?>><a href="<?= base_url('social/following'); ?>"><i class="fa fa-fw fa-user"></i><span> Following </span><small>(19)</small></a></li>
		<li <?php if($this->uri->segment(2) == "message"){echo " class='active'";} ?>><a href="<?= base_url('social/message'); ?>"><i class="fa fa-fw fa-envelope"></i> <span>Messages</span> <small>(2 new)</small></a></li>
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