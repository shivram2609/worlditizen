<style>
.td{align:left;}
</style>
<div class="cmsPages index">
	<h2><?php echo __('CmsPages'); ?></h2>
	<?php echo $this->Form->create("CmsPage",array("div"=>false,)); ?>
	<div class="srch">
		<?php echo $this->element("admins/common",array("place"=>'Search by Page slug',"flag"=>false,"pageheader"=>'',"buttontitle"=>'no',"listflag"=>"no","action"=>'no')); ?>
		<div class="rhs_actions right">
			<a href="<?php echo SITE_LINK."ad-new-cmspage"; ?>">Add CmsPage</a>
			<?php // echo $this->Html->link(__('Add CmsPage'), array('action' => 'add')); ?>
		</div>
	</div>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Form->input("check",array("label"=>false,"div"=>false,"id"=>'checkall',"type"=>'checkbox')); ?></th>
			<th><?php echo $this->Paginator->sort('language_id',"Language"); ?></th>
			<th><?php echo $this->Paginator->sort('slug'); ?></th>
			<th><?php echo $this->Paginator->sort('seo_url'); ?></th>
			<th><?php echo $this->Paginator->sort('header'); ?></th>
			<th><?php echo $this->Paginator->sort('is_active'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($cmsPages as $cmsPage): ?>
	<tr>
		<td><?php echo $this->Form->input("id.".$cmsPage['CmsPage']['id'],array("class"=>'chk',"value"=>$cmsPage['CmsPage'],"type"=>'checkbox',"div"=>false,"label"=>false)); ?><?php echo $this->Form->input("status.".$cmsPage['CmsPage']['id'],array("type"=>'hidden',"value"=>($cmsPage['CmsPage']['is_active'] == 1?0:1))); ?></td>
		<td>
            <?php echo $cmsPage['Language']['name']; ?>
		</td>
		
		<td><?php echo h($cmsPage['CmsPage']['slug']); ?>&nbsp;</td>
		<td><?php echo h($cmsPage['CmsPage']['seo_url']); ?>&nbsp;</td>
		<td><?php echo h($cmsPage['CmsPage']['header']); ?>&nbsp;</td>
		<td><?php echo h(($cmsPage['CmsPage']['is_active'] == 1)?'Active':'Inactive'); ?>&nbsp;</td>
		<td><?php echo h($cmsPage['CmsPage']['created']); ?>&nbsp;</td>
		<td><?php echo h($cmsPage['CmsPage']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php // echo $this->Html->link(__('View'), array('action' => 'view', $cmsPage['CmsPage']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cmsPage['CmsPage']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $cmsPage['CmsPage']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $cmsPage['CmsPage']['id']))); ?>
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

