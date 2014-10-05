
<!-- Profile -->
<div class="widget">
    <div class="widget-body text-center">
        <a href="">
			<?php if ($user->profile_photo == null){ ?>
				<img src="<?= assets_url('img/avatar.jpg'); ?>" class="profile-picture">
			<?php }else{ ?>
				<img src="<?= storage_url('avatar/' . $user->profile_photo); ?>" class="profile-picture">
			<?php } ?>
		</a>
        <h2 class="strong margin-none"><?= $user->full_name ?></h2>
        <div class="innerB"><?= $user->country . ', ' . $user->city; ?></div>
        <div class="btn-group-vertical btn-block">
            <a href="<?= base_url('social/setting'); ?>" class="btn btn-default strong"><i class="fa fa-cog pull-right"></i>Edit Account</a>
            <a href="<?= base_url('social/auth/logout'); ?>" class="btn btn-default strong"><i class="fa fa-cog pull-right"></i>Logout</a>
        </div>
    </div>
</div>
<!-- Who to follow -->
<?php
	$follow = $this->user_model->get_who_to_follow($this->session->userdata('user_id'));
?>
<div class="widget">
	<h5 class="innerAll margin-none border-bottom bg-gray">Who to follow</h5>
	<?php foreach ($follow as $row): ?>
		<div class="widget-body padding-none">
			<div class="media border-bottom innerAll margin-none">
				<?php if ($row->profile_photo == null){ ?>
					<img src="<?= assets_url('img/avatar.jpg'); ?>" class="pull-left media-object profile-picture">
				<?php }else{ ?>
					<img src="<?= storage_url('avatar/' . $row->profile_photo); ?>" class="pull-left media-object profile-picture">
				<?php } ?>
				<div class="media-body">
					<a href="#" class="pull-right text-muted innerT half" data-toggle="tooltip" title="Close">
						<i class="fa fa-close"></i>
					</a>
					<h5 class="margin-none"><a href="<?= base_url('social/selfie/'.$row->username); ?>" class="text-inverse"><?= $row->full_name ?></a></h5>
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
	<?php endforeach ?>
</div>


<div class="widget">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs bg-gray" role="tablist">
	  <li class="active"><a href="#home" role="tab" data-toggle="tab">Most like selfie</a></li>
	  <li><a href="#profile" role="tab" data-toggle="tab">Most like ootd</a></li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
	    <div class="tab-pane active" id="home">
			<div class="widget-body padding-none">
				<div class="media border-bottom innerAll margin-none">
					<div class="most-like last-most-like">
						<div class="bg-primary">
							<div class="media margin-none">
						        <a href="<?= base_url('social/selfie/' . $user->username) ?>" class="pull-left innerAll">
									<?php if ($user->profile_photo == null){ ?>
										<img src="<?= assets_url('img/avatar.jpg'); ?>" width="50" class="profile-picture media-object" >
									<?php }else{ ?>
										<img src="<?= storage_url('avatar/' . $user->profile_photo); ?>"  width="50" class="profile-picture media-object" >
									<?php } ?>	
						        </a>
						        <div class="media-body innerTB">
						            <a href="#" class="text-white strong display-block">Julius Kencana</a>
						            <a href="#" id="like" data-content="selfie" class="text-small text-white">
						            	Like 
						            </a>
						            <a href="#" class="text-small text-white">
						            	<span>(10)</span>
						            </a>
						        </div>
						    </div>
					    </div>
					    <div>
					        <a href="#"><img src="<?= assets_url('img/2.jpg'); ?>" alt="" class="img-outfit display-block-inline"></a>
					    </div>
					</div>
					<div class="most-like last-most-like">
						<div class="bg-primary">
							<div class="media margin-none">
						        <a href="<?= base_url('social/selfie/' . $user->username) ?>" class="pull-left innerAll">
									<?php if ($user->profile_photo == null){ ?>
										<img src="<?= assets_url('img/avatar.jpg'); ?>" width="50" class="profile-picture media-object" >
									<?php }else{ ?>
										<img src="<?= storage_url('avatar/' . $user->profile_photo); ?>"  width="50" class="profile-picture media-object" >
									<?php } ?>	
						        </a>
						        <div class="media-body innerTB">
						            <a href="#" class="text-white strong display-block">Julius Kencana</a>
						            <a href="#" id="like" data-content="selfie" class="text-small text-white">
						            	Like 
						            </a>
						            <a href="#" class="text-small text-white">
						            	<span>(10)</span>
						            </a>
						        </div>
						    </div>
					    </div>
					    <div>
					        <a href="#"><img src="<?= assets_url('img/2.jpg'); ?>" alt="" class="img-outfit display-block-inline"></a>
					    </div>
					</div>
					<div class="most-like">
						<div class="bg-primary">
							<div class="media margin-none">
						        <a href="<?= base_url('social/selfie/' . $user->username) ?>" class="pull-left innerAll">
									<?php if ($user->profile_photo == null){ ?>
										<img src="<?= assets_url('img/avatar.jpg'); ?>" width="50" class="profile-picture media-object" >
									<?php }else{ ?>
										<img src="<?= storage_url('avatar/' . $user->profile_photo); ?>"  width="50" class="profile-picture media-object" >
									<?php } ?>	
						        </a>
						        <div class="media-body innerTB">
						            <a href="#" class="text-white strong display-block">Julius Kencana</a>
						            <a href="#" id="like" data-content="selfie" class="text-small text-white">
						            	Like 
						            </a>
						            <a href="#" class="text-small text-white">
						            	<span>(10)</span>
						            </a>
						        </div>
						    </div>
					    </div>
					    <div>
					        <a href="#"><img src="<?= assets_url('img/2.jpg'); ?>" alt="" class="img-outfit display-block-inline"></a>
					    </div>
					</div>
					<div class="most-like last-most-like">
						<div class="bg-primary">
							<div class="media margin-none">
						        <a href="<?= base_url('social/selfie/' . $user->username) ?>" class="pull-left innerAll">
									<?php if ($user->profile_photo == null){ ?>
										<img src="<?= assets_url('img/avatar.jpg'); ?>" width="50" class="profile-picture media-object" >
									<?php }else{ ?>
										<img src="<?= storage_url('avatar/' . $user->profile_photo); ?>"  width="50" class="profile-picture media-object" >
									<?php } ?>	
						        </a>
						        <div class="media-body innerTB">
						            <a href="#" class="text-white strong display-block">Julius Kencana</a>
						            <a href="#" id="like" data-content="selfie" class="text-small text-white">
						            	Like 
						            </a>
						            <a href="#" class="text-small text-white">
						            	<span>(10)</span>
						            </a>
						        </div>
						    </div>
					    </div>
					    <div>
					        <a href="#"><img src="<?= assets_url('img/2.jpg'); ?>" alt="" class="img-outfit display-block-inline"></a>
					    </div>
					</div>
					<div class="most-like">
						<div class="bg-primary">
							<div class="media margin-none">
						        <a href="<?= base_url('social/selfie/' . $user->username) ?>" class="pull-left innerAll">
									<?php if ($user->profile_photo == null){ ?>
										<img src="<?= assets_url('img/avatar.jpg'); ?>" width="50" class="profile-picture media-object" >
									<?php }else{ ?>
										<img src="<?= storage_url('avatar/' . $user->profile_photo); ?>"  width="50" class="profile-picture media-object" >
									<?php } ?>	
						        </a>
						        <div class="media-body innerTB">
						            <a href="#" class="text-white strong display-block">Julius Kencana</a>
						            <a href="#" id="like" data-content="selfie" class="text-small text-white">
						            	Like 
						            </a>
						            <a href="#" class="text-small text-white">
						            	<span>(10)</span>
						            </a>
						        </div>
						    </div>
					    </div>
					    <div>
					        <a href="#"><img src="<?= assets_url('img/2.jpg'); ?>" alt="" class="img-outfit display-block-inline"></a>
					    </div>
					</div>
				</div>
			</div>
	    </div>
	    <div class="tab-pane" id="profile">
	    	<div class="widget-body padding-none">
				<div class="media border-bottom innerAll margin-none">
					<div class="most-like last-most-like">
						<div class="bg-primary">
							<div class="media margin-none">
						        <a href="<?= base_url('social/selfie/' . $user->username) ?>" class="pull-left innerAll">
									<?php if ($user->profile_photo == null){ ?>
										<img src="<?= assets_url('img/avatar.jpg'); ?>" width="50" class="profile-picture media-object" >
									<?php }else{ ?>
										<img src="<?= storage_url('avatar/' . $user->profile_photo); ?>"  width="50" class="profile-picture media-object" >
									<?php } ?>	
						        </a>
						        <div class="media-body innerTB">
						            <a href="#" class="text-white strong display-block">Julius Kencana</a>
						            <a href="#" id="like" data-content="selfie" class="text-small text-white">
						            	Like 
						            </a>
						            <a href="#" class="text-small text-white">
						            	<span>(10)</span>
						            </a>
						        </div>
						    </div>
					    </div>
					    <div>
					        <a href="#"><img src="<?= assets_url('img/1.jpg'); ?>" alt="" class="img-outfit display-block-inline"></a>
					    </div>
					</div>
					<div class="most-like last-most-like">
						<div class="bg-primary">
							<div class="media margin-none">
						        <a href="<?= base_url('social/selfie/' . $user->username) ?>" class="pull-left innerAll">
									<?php if ($user->profile_photo == null){ ?>
										<img src="<?= assets_url('img/avatar.jpg'); ?>" width="50" class="profile-picture media-object" >
									<?php }else{ ?>
										<img src="<?= storage_url('avatar/' . $user->profile_photo); ?>"  width="50" class="profile-picture media-object" >
									<?php } ?>	
						        </a>
						        <div class="media-body innerTB">
						            <a href="#" class="text-white strong display-block">Julius Kencana</a>
						            <a href="#" id="like" data-content="selfie" class="text-small text-white">
						            	Like 
						            </a>
						            <a href="#" class="text-small text-white">
						            	<span>(10)</span>
						            </a>
						        </div>
						    </div>
					    </div>
					    <div>
					        <a href="#"><img src="<?= assets_url('img/1.jpg'); ?>" alt="" class="img-outfit display-block-inline"></a>
					    </div>
					</div>
					<div class="most-like">
						<div class="bg-primary">
							<div class="media margin-none">
						        <a href="<?= base_url('social/selfie/' . $user->username) ?>" class="pull-left innerAll">
									<?php if ($user->profile_photo == null){ ?>
										<img src="<?= assets_url('img/avatar.jpg'); ?>" width="50" class="profile-picture media-object" >
									<?php }else{ ?>
										<img src="<?= storage_url('avatar/' . $user->profile_photo); ?>"  width="50" class="profile-picture media-object" >
									<?php } ?>	
						        </a>
						        <div class="media-body innerTB">
						            <a href="#" class="text-white strong display-block">Julius Kencana</a>
						            <a href="#" id="like" data-content="selfie" class="text-small text-white">
						            	Like 
						            </a>
						            <a href="#" class="text-small text-white">
						            	<span>(10)</span>
						            </a>
						        </div>
						    </div>
					    </div>
					    <div>
					        <a href="#"><img src="<?= assets_url('img/1.jpg'); ?>" alt="" class="img-outfit display-block-inline"></a>
					    </div>
					</div>
					<div class="most-like last-most-like">
						<div class="bg-primary">
							<div class="media margin-none">
						        <a href="<?= base_url('social/selfie/' . $user->username) ?>" class="pull-left innerAll">
									<?php if ($user->profile_photo == null){ ?>
										<img src="<?= assets_url('img/avatar.jpg'); ?>" width="50" class="profile-picture media-object" >
									<?php }else{ ?>
										<img src="<?= storage_url('avatar/' . $user->profile_photo); ?>"  width="50" class="profile-picture media-object" >
									<?php } ?>	
						        </a>
						        <div class="media-body innerTB">
						            <a href="#" class="text-white strong display-block">Julius Kencana</a>
						            <a href="#" id="like" data-content="selfie" class="text-small text-white">
						            	Like 
						            </a>
						            <a href="#" class="text-small text-white">
						            	<span>(10)</span>
						            </a>
						        </div>
						    </div>
					    </div>
					    <div>
					        <a href="#"><img src="<?= assets_url('img/1.jpg'); ?>" alt="" class="img-outfit display-block-inline"></a>
					    </div>
					</div>
					<div class="most-like">
						<div class="bg-primary">
							<div class="media margin-none">
						        <a href="<?= base_url('social/selfie/' . $user->username) ?>" class="pull-left innerAll">
									<?php if ($user->profile_photo == null){ ?>
										<img src="<?= assets_url('img/avatar.jpg'); ?>" width="50" class="profile-picture media-object" >
									<?php }else{ ?>
										<img src="<?= storage_url('avatar/' . $user->profile_photo); ?>"  width="50" class="profile-picture media-object" >
									<?php } ?>	
						        </a>
						        <div class="media-body innerTB">
						            <a href="#" class="text-white strong display-block">Julius Kencana</a>
						            <a href="#" id="like" data-content="selfie" class="text-small text-white">
						            	Like 
						            </a>
						            <a href="#" class="text-small text-white">
						            	<span>(10)</span>
						            </a>
						        </div>
						    </div>
					    </div>
					    <div>
					        <a href="#"><img src="<?= assets_url('img/1.jpg'); ?>" alt="" class="img-outfit display-block-inline"></a>
					    </div>
					</div>
				</div>
			</div>
	    </div>
	</div>
</div>