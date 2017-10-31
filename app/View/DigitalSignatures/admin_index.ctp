<style>
.td{align:left;}
</style>
<div class="digitalSignatures index">
	<h2><?php echo __('Digital Signatures'); ?></h2>
	<?php echo $this->Form->create("DigitalSignature",array("div"=>false,)); ?>
	<div class="srch">
		<?php echo $this->element("admins/common",array("place"=>'Search by Language Name ',"flag"=>false,"pageheader"=>'',"buttontitle"=>'no',"listflag"=>"no","action"=>'no',"selflag"=>true)); ?>
		<div class="rhs_actions right">
			<a href="<?php echo SITE_LINK."ad-new-digitalsignature"; ?>">Add Digital Sign</a>
			
		</div>	
	</div>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Form->input("check",array("label"=>false,"div"=>false,"id"=>'checkall',"type"=>'checkbox')); ?></th>
			<th><?php echo $this->Paginator->sort('language_id',"Language"); ?></th>
			<th><?php echo $this->Paginator->sort('is_active'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($digitalSignatures as $digitalSignature): ?>
	<tr>
		<td><?php echo $this->Form->input("id.".$digitalSignature['DigitalSignature']['id'],array("class"=>'chk',"value"=>$digitalSignature['DigitalSignature']['id'],"type"=>'checkbox',"div"=>false,"label"=>false)); ?><?php echo $this->Form->input("status.".$digitalSignature['DigitalSignature']['id'],array("type"=>'hidden',"value"=>($digitalSignature['DigitalSignature']['is_active'] == 1?0:1))); ?></td>
		<td><?php echo h($digitalSignature['Language']['name']);?>&nbsp; </td>
		<td><?php echo h(($digitalSignature['DigitalSignature']['is_active']== 1)?'Active':'Inactive'); ?>&nbsp;</td>
		<td><?php echo h($digitalSignature['DigitalSignature']['created']); ?>&nbsp;</td>
		<td><?php echo h($digitalSignature['DigitalSignature']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $digitalSignature['DigitalSignature']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $digitalSignature['DigitalSignature']['id'])); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $digitalSignature['DigitalSignature']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $digitalSignature['DigitalSignature']['id']))); ?>
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
