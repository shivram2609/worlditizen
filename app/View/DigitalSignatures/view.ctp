<div class="digitalSignatures view">
<h2><?php echo __('Digital Signature'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($digitalSignature['DigitalSignature']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Language'); ?></dt>
		<dd>
			<?php echo $this->Html->link($digitalSignature['Language']['name'], array('controller' => 'languages', 'action' => 'view', $digitalSignature['Language']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($digitalSignature['DigitalSignature']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Active'); ?></dt>
		<dd>
			<?php echo h($digitalSignature['DigitalSignature']['is_active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($digitalSignature['DigitalSignature']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($digitalSignature['DigitalSignature']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Digital Signature'), array('action' => 'edit', $digitalSignature['DigitalSignature']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Digital Signature'), array('action' => 'delete', $digitalSignature['DigitalSignature']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $digitalSignature['DigitalSignature']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Digital Signatures'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Digital Signature'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Languages'), array('controller' => 'languages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Language'), array('controller' => 'languages', 'action' => 'add')); ?> </li>
	</ul>
</div>
