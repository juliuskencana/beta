<div class="tabsbar-setting">
	<ul>
		<li <?php if($this->uri->segment(3) == "" && $this->uri->segment(2) == "setting"){echo "class='active'";} ?>><a href="<?= base_url('social/setting') ?>">Profile</a></li>
		<li <?php if($this->uri->segment(3) == "password"){echo "class='active'";} ?>><a href="<?= base_url('social/setting/password') ?>">Password</a></li>
		<li <?php if($this->uri->segment(3) == "email_notification"){echo "class='active'";} ?>><a href="<?= base_url('social/setting/email_notification') ?>">Email Notifications</a></li>
		<li <?php if($this->uri->segment(3) == "muted_account"){echo "class='active'";} ?>><a href="<?= base_url('social/setting/muted_account') ?>">Muted Accounts</a></li>
	</ul>
</div>