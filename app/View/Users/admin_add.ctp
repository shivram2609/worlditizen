<div class="users form">
<?php echo $this->Form->create('User',array("novalidate"=>true)); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('password');
		echo $this->Form->input('is_active');
		echo $this->Form->input('is_delete');
		echo $this->Form->input('confirmation_token');
		echo $this->Form->input('password_token');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
