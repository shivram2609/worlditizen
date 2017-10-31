<div class="digitalSignatures form">
<?php echo $this->Form->create('DigitalSignature'); ?>
	<fieldset>
		<legend><?php echo __('Edit Digital Signature'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('language_id');
		echo $this->Form->input('content');
		echo $this->Form->input('is_active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('DigitalSignature.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('DigitalSignature.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Digital Signatures'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Languages'), array('controller' => 'languages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Language'), array('controller' => 'languages', 'action' => 'add')); ?> </li>
	</ul>
</div>
