<div class="languages form">
<?php echo $this->Form->create('Language'); ?>
	<fieldset>
		<legend><?php echo __('Add Language'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('short_code');
		echo $this->Form->input('is_active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Languages'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cms Pages'), array('controller' => 'cms_pages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cms Page'), array('controller' => 'cms_pages', 'action' => 'add')); ?> </li>
	</ul>
</div>
