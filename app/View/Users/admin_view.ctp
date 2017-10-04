<div class="users view">
<?php //pr($user); 
$userToken = base64_encode($user['UserDetail']['first_name']."^_^".$user['User']['email']); ?>
<h2><?php echo __('User Request'); ?></h2>
	<dl>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($user['UserDetail']['title'].' '.$user['UserDetail']['first_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($user['UserDetail']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone Number'); ?></dt>
		<dd>
			<?php echo h($user['UserDetail']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Paypal Email'); ?></dt>
		<dd>
			<?php echo h($user['UserDetail']['paypal_email']); ?>
			&nbsp;
		</dd>
	</dl>
	<a href="<?php echo SITE_LINK."admin/process/".$user['User']['id']."/".$userToken; ?>" onclick="return confirm('Do you really want to Approve this request?');" class="btn cancel-btn">Approve</a>&nbsp;<a href="<?php echo SITE_LINK."admin/process/".$user['User']['id']."/".$userToken."/d"; ?>" onclick="return confirm('Do you really want to Reject this request?');" class="btn cancel-btn">Reject</a>
</div>
