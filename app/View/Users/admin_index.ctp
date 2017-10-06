<style>
.td{align:left;}
</style>
<div class="users index">
	<h2><?php echo __('Users'); ?></h2>
	<?php echo $this->Form->create("User",array("div"=>false,)); ?>
	<div class="srch">
		<?php echo $this->element("admins/common",array("place"=>'Search by Username ',"flag"=>false,"pageheader"=>'',"buttontitle"=>'no',"listflag"=>"no","action"=>'no')); ?>
		
	</div>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Form->input("check",array("label"=>false,"div"=>false,"id"=>'checkall',"type"=>'checkbox')); ?></th>
			<th class="leftalign"><?php echo $this->Paginator->sort('UserDetail.name','Name'); ?></th>
			<th class="leftalign"><?php echo $this->Paginator->sort('Username'); ?></th>
			<th  class="leftalign"><?php echo $this->Paginator->sort('is_active'); ?></th>
			<th  class="leftalign"><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="leftalign"><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php //pr($users); ?>
	
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo $this->Form->input("id.".$user['User']['id'],array("class"=>'chk',"value"=>$user['User']['id'],"type"=>'checkbox',"div"=>false,"label"=>false)); ?><?php echo $this->Form->input("status.".$user['User']['id'],array("type"=>'hidden',"value"=>($user['User']['is_active'] == 1?0:1))); ?></td>
		<td  class="leftalign"><?php echo h($user['UserDetail']['name']); ?>&nbsp;</td>
		<td  class="leftalign"><?php echo h($user['User']['username']); ?>&nbsp;</td>
		<td  class="leftalign"><?php echo h(($user['User']['is_active'] == 1)?'Active':'Inactive'); ?>&nbsp;</td>
		<td  class="leftalign"><?php echo h($user['User']['created']); ?>&nbsp;</td>
		<td class="leftalign"><?php echo h($user['User']['modified']); ?>&nbsp;</td>
		<td class="actions">
			
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $user['UserDetail']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
	<?php echo $this->Form->end(); ?>
</div>
