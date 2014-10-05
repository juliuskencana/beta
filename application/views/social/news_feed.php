<div class="container" style="padding-top: 68px;">
	<!-- Profile Content  -->
	<div class="row">
		<!-- timeline -->
		<div class="col-lg-9 col-md-8">
			<div class="timeline-cover">	
				<?php $this->load->view('social/cover'); ?>
				<div class="row">
					<?php foreach ($feed as $row): ?>
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
								            	<?php if ($row->user_journal_post_type == "ootd"){ ?>
								            		<span class="text-white strong">trendsetter</span>
								            	<?php }else{ ?>
								            		<span class="text-white strong">selfie</span>
								            	<?php } ?>
								            	on <?= date('M jS, Y', strtotime($row->user_journal_post_timestamp)); ?>
								            </small>
								            <?php
								            	$total_like = $this->like_model->get_like_count($row->user_journal_post_id);
								            	$check_like = $this->like_model->check_like($row->user_journal_post_id, $this->session->userdata('user_id'));
								            ?>
								            <?php if ($check_like){ ?>
									            <a href="#" id="unlike" data-content="<?php if($row->user_journal_post_type == "ootd"){echo "ootd";}else{echo "selfie";} ?>" data-id="<?= $row->user_journal_post_id ?>" class="text-small text-white">
									            	Unlike 
									            </a>
									            <a href="#" class="text-small text-white">
									            	<span id='count-<?= $row->user_journal_post_id ?>' data-count="<?= $total_like ?>">(<?= $total_like ?>)</span>
									            </a>
									            <?php }else{ ?>
									            <a href="#" id="like" data-content="<?php if($row->user_journal_post_type == "ootd"){echo "ootd";}else{echo "selfie";} ?>" data-id="<?= $row->user_journal_post_id ?>" class="text-small text-white">
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

					            	<?php if ($row->user_journal_post_type == "ootd"){ ?>
							        	<a href="#"><img src="<?= storage_url('ootd/' . $row->user_journal_post_content); ?>" alt="" class="img-outfit display-block-inline"></a>
					            	<?php }else{ ?>
							        	<a href="#"><img src="<?= storage_url('selfie/' . $row->user_journal_post_content); ?>" alt="" class="img-outfit display-block-inline"></a>
					            	<?php } ?>
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