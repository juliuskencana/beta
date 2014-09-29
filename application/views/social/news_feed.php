<?php include 'header.php'; ?>
<div class="container" style="padding-top: 68px;">

	<!-- Profile Content  -->
	<div class="row">
		<!-- timeline -->
		<div class="col-lg-9 col-md-8">
			<div class="timeline-cover">	
				
				<?php $this->load->view('social/cover'); ?>

				<div class="widget-grey">
					<div class="widget-body-grey padding-none margin-none">
						<form action="" class="update-status">
							<textarea placeholder="What's up?"></textarea>
							<input type="submit" value="Post" class="btn btn-primary pull-right">
						</form>
					</div>
				</div>

				<div class="row js-masonry" style="margin-top: 70px;" data-masonry-options='{ "itemSelector": ".item", "columnWidth": 200 }'>
					<div class="col-md-6">
						<div class="widget">
							<div class="widget-body padding-none margin-none">
								<div class="media margin-none">
							        <a href="" class="pull-left innerAll">
							        	<img src="<?= base_url('assets/img/profile_picture.jpg'); ?>" width="50" class="profile-picture media-object" >
							        </a>
							        <div class="media-body innerTB">
							            <a href="" class="strong text-inverse">Julius Kencana</a>
							            <small class="text-muted display-block ">on Jan 15th, 2014</small>
							            <div>- Happy B-Day!</div>
							            <a href="#" class="text-small">Like</a>
							            <a href="#" class="text-small">Share</a>
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
					<div class="col-md-6">
						<div class="widget">
							<div class="widget-body padding-none margin-none">
								<div class="media margin-none">
							        <a href="" class="pull-left innerAll">
							        	<img src="<?= base_url('assets/img/profile_picture.jpg'); ?>" width="50" class="profile-picture media-object" >
							        </a>
							        <div class="media-body innerTB">
							            <a href="" class="strong text-inverse">Julius Kencana </a>
							            shared
							            <a href="" class="strong text-inverse">Ferddy Ericko</a>'s post
							            <small class="text-muted display-block ">on Jan 15th, 2014</small>
							            <div>- Happy B-Day!</div>
							            <a href="#" class="text-small">Like</a>
							            <a href="#" class="text-small">Share</a>
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
					
					<div class="col-md-6">
						<div class="widget">
							<div class="widget-body padding-none margin-none">
								<div class="media margin-none">
							        <a href="" class="pull-left innerAll">
							        	<img src="<?= base_url('assets/img/profile_picture.jpg'); ?>" width="50" class="profile-picture media-object" >
							        </a>
							        <div class="media-body innerTB">
							            <a href="" class="strong text-inverse">Julius Kencana </a>
							            shared
							            <a href="" class="strong text-inverse">Ferddy Ericko</a>'s post
							            <small class="text-muted display-block ">on Jan 15th, 2014</small>
							            <div>- Happy B-Day!</div>
							            <a href="#" class="text-small">Like</a>
							            <a href="#" class="text-small">Share</a>
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
				</div>
			</div>
		</div>
		<!-- right sidebar -->
		<div class="col-md-4 col-lg-3">
			<?php $this->load->view('social/right_sidebar'); ?>
		</div>
		
	</div>

</div>
<?php include 'footer.php'; ?>