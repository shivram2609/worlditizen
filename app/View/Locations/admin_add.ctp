<div class="locations form">
<?php echo $this->Form->create('Location',array("novalidate"=>true)); ?>
	<fieldset>
		<legend><?php echo __('Add Location'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('short_code');
		echo $this->Form->input('is_active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

