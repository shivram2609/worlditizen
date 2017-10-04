<div class="users view">
<h2><?php echo __('User'); ?></h2>
	<dl>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Active'); ?></dt>
		<dd>
			<?php echo h($user['User']['is_active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Delete'); ?></dt>
		<dd>
			<?php echo h($user['User']['is_delete']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Confirmation Token'); ?></dt>
		<dd>
			<?php echo h($user['User']['confirmation_token']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password Token'); ?></dt>
		<dd>
			<?php echo h($user['User']['password_token']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($user['User']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['username'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['username']), array('confirm' => __('Are you sure you want to delete # %s?', $user['User']['username']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List User Details'), array('controller' => 'user_details', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Detail'), array('controller' => 'user_details', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related User Details'); ?></h3>
	<?php if (!empty($user['UserDetail'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Details'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($user['UserDetail'] as $userDetail): ?>
		<tr>
			<td><?php echo $userDetail['id']; ?></td>
			<td><?php echo $userDetail['user_id']; ?></td>
			<td><?php echo $userDetail['details']; ?></td>
			<td><?php echo $userDetail['name']; ?></td>
			<td><?php echo $userDetail['created']; ?></td>
			<td><?php echo $userDetail['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'user_details', 'action' => 'view', $userDetail['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'user_details', 'action' => 'edit', $userDetail['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'user_details', 'action' => 'delete', $userDetail['id']), array('confirm' => __('Are you sure you want to delete # %s?', $userDetail['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New User Detail'), array('controller' => 'user_details', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
