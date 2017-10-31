<div class="emailTemplates form">
<?php echo $this->Form->create('EmailTemplate'); ?>
	<fieldset>
		<legend><?php echo __('Edit Email Template'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('language_id');
		echo $this->Form->input('slug');
		echo $this->Form->input('email_from');
		echo $this->Form->input('content');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('EmailTemplate.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('EmailTemplate.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Email Templates'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Languages'), array('controller' => 'languages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Language'), array('controller' => 'languages', 'action' => 'add')); ?> </li>
	</ul>
</div>
