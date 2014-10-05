<?php
	$follower = $this->user_model->get_count_follower($user_id->social_user_id);
	$following = $this->user_model->get_count_following($user_id->social_user_id);
?>
<div class="container" style="padding-top: 68px;">
	<!-- Profile Content  -->
	<div class="row">
		<!-- timeline -->
		<div class="col-lg-9 col-md-8">
			<div class="timeline-cover">	
				
				<?php $this->load->view('social/cover'); ?>

				<div class="widget-grey">
					<div class="widget-body-grey padding-none margin-none">
						<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#upload">Upload your selfie</a>
					</div>
				</div>

				<div class="row" style="margin-top: 15px;">
					<div class="col-sm-6">
						<div class="innerAll bg-white widget">
							<h5>Profile</h5>
							<div class="media innerB ">
								<a href="" class="pull-left">
									<?php if ($user_id->profile_photo == null){ ?>
										<img class="profile-picture pull-left" src="<?= assets_url('img/avatar.jpg'); ?>">
									<?php }else{ ?>
										<img class="profile-picture pull-left" src="<?= storage_url('avatar/' . $user_id->profile_photo); ?>">
									<?php } ?>	
								</a>
							</div>
						</div>

						<div class="widget">
							<div class="widget-head border-bottom bg-gray">
								<h5 class="innerAll pull-left margin-none">Basic Info</h5>
								<div class="pull-right">
									<a href="" class="text-muted">
										<i class="fa fa-pencil innerL"></i>
									</a>
								</div>
							</div>
							<div class="widget-body">
								<div class="row innerAll">
									<div class="col-sm-6">User:</div>
									<div class="col-sm-6 text-right">
										<span class="label label-default"><?= $user_id->username ?></span>
									</div>
								</div>
								<div class="row innerAll">
									<div class="col-sm-6">Follower:</div>
									<div class="col-sm-6 text-right">
										<span class="label label-default"><?= $follower ?></span>
									</div>
								</div>
								<div class="row innerAll">
									<div class="col-sm-6">Following:</div>
									<div class="col-sm-6 text-right">
										<span class="label label-default"><?= $following ?></span>
									</div>
								</div>
								<div class="row innerAll">
									<div class="col-sm-6">Joined:</div>
									<div class="col-sm-6 text-right">
										<span class="label label-default"><?= date('d F Y', strtotime($user_id->create_date)); ?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="widget">
							<div class="widget-head border-bottom bg-gray">
								<h5 class="innerAll pull-left margin-none">Contact</h5>
								<div class="pull-right">
									<a href="http://<?= $user_id->facebook ?>" class="text-muted" target=_blank>
										<i class="fa fa-facebook innerL"></i>
									</a>
									<a href="http://<?= $user_id->twitter ?>" class="text-muted" target=_blank>
										<i class="fa fa-twitter innerL"></i>
									</a>
									<a href="http://<?= $user_id->website ?>" class="text-muted" target=_blank>
										<i class="fa fa-dribbble innerL"></i>
									</a>
								</div>
							</div>
							<div class="widget-body padding-none">
								<div class="innerAll">
									<p class="margin-none"><i class="fa fa-envelope fa-fw text-muted"></i> <?= $user_id->email ?></p>
								</div>
								<div class="border-top innerAll">
									<p class="margin-none"><i class="fa fa-link fa-fw text-muted"></i> <a target=_blank href="http://<?= $user_id->website ?>">Visit website</a></p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="row" style="margin-top: 70px;">
					<?php foreach ($selfie as $row): ?>
						<div class="widget">
							<div class="widget-body padding-none margin-none">
								<div class="bg-primary">
									<div class="media margin-none">
								        <a href="<?= base_url('social/selfie/' . $row->username) ?>" class="pull-left innerAll">
											<?php if ($row->profile_photo == null){ ?>
												<img src="<?= assets_url('img/avatar.jpg'); ?>" width="50" class="profile-picture media-object" >
											<?php }else{ ?>
												<img src="<?= storage_url('avatar/' . $row->profile_photo); ?>"  width="50" class="profile-picture media-object" >
											<?php } ?>	
								        </a>
								        <div class="media-body innerTB">
								            <a href="<?= base_url('social/selfie/' . $row->username) ?>" class="text-white strong display-block"><?= $row->full_name ?></a>

								            <small class="display-block">
								            	added
								            	<span class="text-white strong">selfie</span>
								            	on <?= date('M jS, Y', strtotime($row->user_journal_post_timestamp)); ?>
								            </small>
								            <?php
								            	$total_like = $this->like_model->get_like_count($row->user_journal_post_id);
								            	$check_like = $this->like_model->check_like($row->user_journal_post_id, $this->session->userdata('user_id'));
								            ?>
								            <?php if ($check_like){ ?>
									            <a href="#" id="unlike" data-content="selfie" data-id="<?= $row->user_journal_post_id ?>" class="text-small text-white">
									            	Unlike 
									            </a>
									            <a href="#" class="text-small text-white">
									            	<span id='count-<?= $row->user_journal_post_id ?>' data-count="<?= $total_like ?>">(<?= $total_like ?>)</span>
									            </a>
									            <?php }else{ ?>
									            <a href="#" id="like" data-content="selfie" data-id="<?= $row->user_journal_post_id ?>" class="text-small text-white">
									            	Like 
									            </a>
									            <a href="#" class="text-small text-white">
									            	<span id='count-<?= $row->user_journal_post_id ?>' data-count="<?= $total_like ?>">(<?= $total_like ?>)</span>
									            </a>
								            <?php } ?>
								        </div>
								    </div>
							    </div>
							    <div>
							        <a href="#"><img src="<?= storage_url('selfie/' . $row->user_journal_post_content); ?>" alt="" class="img-outfit display-block-inline"></a>
							    </div>
							    <div class="innerAll border-top">
							        <p><?= $row->user_journal_post_description ?></p>
							    </div>
							    <?php
							    	$total_comment = $this->comment_model->get_comment_count($row->user_journal_post_id);
							    	$comments = $this->comment_model->get_comment_by_journal_id($row->user_journal_post_id);
							    ?>
							    <div class="bg-grey innerAll text-small ">
							        <span>View all <a href="#" class="text-primary" id="view-all" data-view-id="<?= $row->user_journal_post_id ?>"><?= $total_comment ?> Comments</a></span>
							    </div>
							    <div class="comment-content" data-comment-id="<?= $row->user_journal_post_id ?>">
								    <?php foreach ($comments as $comment): ?>
									    <div class="media border-bottom margin-none bg-gray">
									        <a href="<?= base_url('social/selfie/' . $comment->username) ?>" class="pull-left innerAll">
									        	
												<?php if ($comment->profile_photo == null){ ?>
													<img src="<?= assets_url('img/avatar.jpg'); ?>" width="50" class="media-object" >
												<?php }else{ ?>
													<img src="<?= storage_url('avatar/' . $comment->profile_photo); ?>"  width="50" class="media-object" >
												<?php } ?>	
									        </a>
									        <div class="media-body innerTB">
									            <a href="<?= base_url('social/selfie/' . $comment->username) ?>" class="strong text-inverse"><?= $comment->full_name ?></a>
									            <small class="text-muted ">wrote on <?= date('M jS, Y', strtotime($comment->user_comment_timestamp)); ?></small>
									            <div><?= $comment->user_comment_content ?></div>
									        </div>
									    </div>
								    <?php endforeach ?>
							    </div>

							    <div class="input-group comment col-xs-12">
							    	<form action="" style="display:inherit">
								        <input type="text" id="comment" data-cpid="<?= $row->user_journal_post_id ?>" data-ct="<?php if($row->user_journal_post_type == "ootd"){echo "ootd";}else{echo "selfie";} ?>" class="form-control" placeholder="Your comment here...">
								        <div class="input-group-btn">
								            <button type="button" class="btn btn-primary" href="#"><i class="fa fa-comment"></i></button>
								        </div>
								    </form>
							    </div>
							</div>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</div>
		<!-- right sidebar -->
		<div class="col-md-4 col-lg-3">
			<?php $this->load->view('social/right_sidebar'); ?>
		</div>
	</div>
</div>



<div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title strong" id="myModalLabel">Selfie</h4>
			</div>
			<div class="modal-body">
				<div class="alert alert-danger" id="alert-selfie">
	                <p><strong>Error!</strong> Please choose your photo</p>
	            </div>
				<form class="form-horizontal selfie" role="form" id="upload-selfie" enctype="multipart/form-data" action="" method="post">
					<div class="form-group" id="left-margin-none">
						<label class="col-sm-2 control-label dark">Photo</label>
						<div class="col-sm-9 col-sm-offset-1">
						    <span class="btn btn-primary btn-file">
							    Choose Image <input type="file" name="photo" id="photo-selfie">
							</span>
						</div>
					</div>
					<div class="form-group" id="left-margin-none">
						<label class="col-sm-2 control-label dark">Description</label>
						<div class="col-sm-9 col-sm-offset-1">
							<textarea name="description" placeholder="What's up?" class="form-control" ></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" id="selfie-post">Post</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>