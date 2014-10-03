<div class="container" style="padding-top: 68px;">

	<!-- Profile Content  -->
	<div class="row">
		<!-- timeline -->
		<div class="col-lg-9 col-md-8">
			<div class="timeline-cover">	
				
				<?php $this->load->view('social/cover'); ?>
				<div class="widget-grey">
					<div class="widget-body-grey padding-none margin-none">
						<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#upload">Upload your outfit</a>
					</div>
				</div>
				<div class="row js-masonry" data-masonry-options='{ "itemSelector": ".item", "columnWidth": 200 }'>
					<?php foreach ($ootd as $row): ?>
						<div class="col-md-6">
							<div class="widget">
								<div class="widget-body padding-none margin-none">
									<div class="bg-primary">
										<div class="media margin-none">
									        <a href="#" class="pull-left innerAll">
												<?php if ($row->profile_photo == null){ ?>
													<img src="<?= assets_url('img/avatar.jpg'); ?>" width="50" class="profile-picture media-object" >
												<?php }else{ ?>
													<img src="<?= storage_url('avatar/' . $row->profile_photo); ?>"  width="50" class="profile-picture media-object" >
												<?php } ?>	
									        </a>
									        <div class="media-body innerTB">
									            <a href="#" class="text-white strong display-block"><?= $row->full_name ?></a>

									            <small class="display-block">
									            	added
									            	<span class="text-white strong">trendsetter</span>
									            	on <?= date('M jS, Y', strtotime($row->user_journal_post_timestamp)); ?>
									            </small>
									            <a href="#" class="text-small text-white">Like</a>
									        </div>
									    </div>
								    </div>
								    <div>
								        <a href="#"><img src="<?= storage_url('ootd/' . $row->user_journal_post_content); ?>" alt="" class="img-outfit display-block-inline"></a>
								    </div>
								    <div class="innerAll border-top">
								        <p><?= $row->user_journal_post_description ?></p>
								    </div>
								    <div class="bg-grey innerAll text-small ">
								        <span>View all <a href="" class="text-primary">2 Comments</a></span>
								    </div>
								    <div class="media border-bottom margin-none bg-gray">
								        <a href="" class="pull-left innerAll"><img src="assets/img/profile_picture.jpg" width="50" class="media-object" ></a>
								        <div class="media-body innerTB">
								            <a href="" class="strong text-inverse">Julius Kencana</a>
								            <small class="text-muted ">wrote on Jan 15th, 2014</small>
								            <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit quam, suscipit asperiores facere ducimus neque molestiae. Molestiae ipsa consequuntur totam corporis aut architecto! Provident repellendus ullam magni earum, fuga facilis.</div>
								        </div>
								    </div>
								    <div class="media border-bottom margin-none bg-gray">
								        <a href="" class="pull-left innerAll"><img src="assets/img/profile_picture.jpg" width="50" class="media-object" ></a>
								        <div class="media-body innerTB">
								            <a href="" class="strong text-inverse">Julius Kencana</a>
								            <small class="text-muted ">wrote on Jan 15th, 2014</small>
								            <div>- Happy B-Day!</div>
								        </div>
								    </div>

								    <div class="input-group comment">
								        <input type="text" class="form-control" placeholder="Your comment here...">
								        <div class="input-group-btn">
								            <button type="button" class="btn btn-primary" href="#"><i class="fa fa-comment"></i></button>
								        </div>
								    </div>
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
				<h4 class="modal-title strong" id="myModalLabel">Outfit of the day</h4>
			</div>
			<div class="modal-body">
				<div class="alert alert-danger" id="alert">
	                <p><strong>Error!</strong> Please choose your photo</p>
	            </div>
				<form class="form-horizontal ootd" role="form" id="upload-ootd" enctype="multipart/form-data" action="" method="post">
					<div class="form-group" id="left-margin-none">
						<label class="col-sm-2 control-label dark">Photo</label>
						<div class="col-sm-9 col-sm-offset-1">
						    <span class="btn btn-primary btn-file">
							    Choose Image <input type="file" name="photo" id="photo-ootd">
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
						<button type="button" class="btn btn-primary" id="ootd-post">Post</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>