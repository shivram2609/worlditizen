<div class="languages index">
	<h2><?php echo __('Languages'); ?></h2>
	<?php echo $this->Form->create("Language",array("div"=>false,)); ?>
	<div class="srch">
		<?php echo $this->element("admins/common",array("place"=>'Search by Languages name',"flag"=>false,"pageheader"=>'',"buttontitle"=>'no',"listflag"=>"no","action"=>'no')); ?>
		<div class="rhs_actions right">
			<a href="<?php echo SITE_LINK."ad-new-language"; ?>">Add Language</a>
			<?php // echo $this->Html->link(__('Add Location'), array('action' => 'add')); ?>
		</div>
	</div>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Form->input("check",array("label"=>false,"div"=>false,"id"=>'checkall',"type"=>'checkbox')); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('short_code'); ?></th>
			<th><?php echo $this->Paginator->sort('is_active'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($languages as $language): ?>
	<tr>
		<td><?php if ($language['Language']['id'] > 1) {  echo $this->Form->input("id.".$language['Language']['id'],array("class"=>'chk',"value"=>$language['Language']['id'],"type"=>'checkbox',"div"=>false,"label"=>false)); ?><?php echo $this->Form->input("status.".$language['Language']['id'],array("type"=>'hidden',"value"=>($language['Language']['is_active'] == 1?0:1))); } ?></td>
		<td><?php echo h($language['Language']['name']); ?>&nbsp;</td>
		<td><?php echo h($language['Language']['short_code']); ?>&nbsp;</td>
		<td><?php echo h(($language['Language']['is_active'])?'Active':'Inactive'); ?>&nbsp;</td>
		<td><?php echo h($language['Language']['created']); ?>&nbsp;</td>
		<td><?php echo h($language['Language']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php // echo $this->Html->link(__('View'), array('action' => 'view', $language['Language']['id'])); ?>
			<?php if ($language['Language']['id'] > 1) { echo $this->Html->link(__('Edit'), array('action' => 'edit', $language['Language']['id'])); ?>
			<?php  echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $language['Language']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $language['Language']['id']))); } ?>
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
