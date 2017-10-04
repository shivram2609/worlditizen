<div class="cmsPages index">
	<h2><?php echo __('Cms Pages'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('language_id'); ?></th>
			<th><?php echo $this->Paginator->sort('content'); ?></th>
			<th><?php echo $this->Paginator->sort('slug'); ?></th>
			<th><?php echo $this->Paginator->sort('seo_url'); ?></th>
			<th><?php echo $this->Paginator->sort('header'); ?></th>
			<th><?php echo $this->Paginator->sort('meta_title'); ?></th>
			<th><?php echo $this->Paginator->sort('meta_keyword'); ?></th>
			<th><?php echo $this->Paginator->sort('is_active'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($cmsPages as $cmsPage): ?>
	<tr>
		<td><?php echo h($cmsPage['CmsPage']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cmsPage['Language']['name'], array('controller' => 'languages', 'action' => 'view', $cmsPage['Language']['id'])); ?>
		</td>
		<td><?php echo h($cmsPage['CmsPage']['content']); ?>&nbsp;</td>
		<td><?php echo h($cmsPage['CmsPage']['slug']); ?>&nbsp;</td>
		<td><?php echo h($cmsPage['CmsPage']['seo_url']); ?>&nbsp;</td>
		<td><?php echo h($cmsPage['CmsPage']['header']); ?>&nbsp;</td>
		<td><?php echo h($cmsPage['CmsPage']['meta_title']); ?>&nbsp;</td>
		<td><?php echo h($cmsPage['CmsPage']['meta_keyword']); ?>&nbsp;</td>
		<td><?php echo h($cmsPage['CmsPage']['is_active']); ?>&nbsp;</td>
		<td><?php echo h($cmsPage['CmsPage']['created']); ?>&nbsp;</td>
		<td><?php echo h($cmsPage['CmsPage']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $cmsPage['CmsPage']['id'])); ?>
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
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Cms Page'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Languages'), array('controller' => 'languages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Language'), array('controller' => 'languages', 'action' => 'add')); ?> </li>
	</ul>
</div>
