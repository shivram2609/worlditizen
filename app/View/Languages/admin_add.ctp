<div class="languages form">
<?php echo $this->Form->create('Language',array("novalidate"=>true)); ?>
	<fieldset>
		<legend><?php echo __('Add Language'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('short_code');
		echo $this->Form->input('is_active',array("type"=>"checkbox"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
