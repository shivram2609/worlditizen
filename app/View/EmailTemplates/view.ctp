<div class="emailTemplates view">
<h2><?php echo __('Email Template'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($emailTemplate['EmailTemplate']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Language'); ?></dt>
		<dd>
			<?php echo $this->Html->link($emailTemplate['Language']['name'], array('controller' => 'languages', 'action' => 'view', $emailTemplate['Language']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($emailTemplate['EmailTemplate']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email From'); ?></dt>
		<dd>
			<?php echo h($emailTemplate['EmailTemplate']['email_from']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($emailTemplate['EmailTemplate']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($emailTemplate['EmailTemplate']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($emailTemplate['EmailTemplate']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Email Template'), array('action' => 'edit', $emailTemplate['EmailTemplate']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Email Template'), array('action' => 'delete', $emailTemplate['EmailTemplate']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $emailTemplate['EmailTemplate']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Email Templates'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Email Template'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Languages'), array('controller' => 'languages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Language'), array('controller' => 'languages', 'action' => 'add')); ?> </li>
	</ul>
</div>
