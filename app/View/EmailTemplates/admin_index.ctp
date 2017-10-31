<style>
.td{align:left;}
</style>

<div class="emailTemplates index">
	<h2><?php echo __('Email Templates'); ?></h2>
	<?php echo $this->Form->create("EmailTemplate",array("div"=>false,)); ?>
	<div class="srch">
		<?php echo $this->element("admins/common",array("place"=>'Search by Language Name ',"flag"=>false,"pageheader"=>'',"buttontitle"=>'no',"listflag"=>"no","action"=>'no',"selflag"=>false)); ?>
		
	</div>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Form->input("check",array("label"=>false,"div"=>false,"id"=>'checkall',"type"=>'checkbox')); ?></th>
			<th><?php echo $this->Paginator->sort('language_id',"Language"); ?></th>
			<th><?php echo $this->Paginator->sort('header',"Title"); ?></th>
			<th><?php echo $this->Paginator->sort('subject',"Subject"); ?></th>
			
			<th><?php echo $this->Paginator->sort('email_from'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($emailTemplates as $emailTemplate): ?>
	<tr>
		<td><?php echo $this->Form->input("id.".$emailTemplate['EmailTemplate']['id'],array("class"=>'chk',"value"=>$emailTemplate['EmailTemplate'],"type"=>'checkbox',"div"=>false,"label"=>false)); ?></td>
		<td><?php echo h($emailTemplate['Language']['name']); ?>&nbsp; </td>
		<td><?php echo h($emailTemplate['EmailTemplate']['header']); ?>&nbsp;</td>
		<td><?php echo h($emailTemplate['EmailTemplate']['subject']); ?>&nbsp;</td>
		<td><?php echo h($emailTemplate['EmailTemplate']['email_from']); ?>&nbsp;</td>
		<td><?php echo h($emailTemplate['EmailTemplate']['created']); ?>&nbsp;</td>
		<td><?php echo h($emailTemplate['EmailTemplate']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $emailTemplate['EmailTemplate']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $emailTemplate['EmailTemplate']['id'])); ?>
			<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $emailTemplate['EmailTemplate']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $emailTemplate['EmailTemplate']['id']))); ?>
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
