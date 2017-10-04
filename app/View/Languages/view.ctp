<div class="languages view">
<h2><?php echo __('Language'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($language['Language']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($language['Language']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Short Code'); ?></dt>
		<dd>
			<?php echo h($language['Language']['short_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Active'); ?></dt>
		<dd>
			<?php echo h($language['Language']['is_active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($language['Language']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($language['Language']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Language'), array('action' => 'edit', $language['Language']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Language'), array('action' => 'delete', $language['Language']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $language['Language']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Languages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Language'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cms Pages'), array('controller' => 'cms_pages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cms Page'), array('controller' => 'cms_pages', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Cms Pages'); ?></h3>
	<?php if (!empty($language['CmsPage'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Language Id'); ?></th>
		<th><?php echo __('Content'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Seo Url'); ?></th>
		<th><?php echo __('Header'); ?></th>
		<th><?php echo __('Meta Title'); ?></th>
		<th><?php echo __('Meta Keyword'); ?></th>
		<th><?php echo __('Is Active'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($language['CmsPage'] as $cmsPage): ?>
		<tr>
			<td><?php echo $cmsPage['id']; ?></td>
			<td><?php echo $cmsPage['language_id']; ?></td>
			<td><?php echo $cmsPage['content']; ?></td>
			<td><?php echo $cmsPage['slug']; ?></td>
			<td><?php echo $cmsPage['seo_url']; ?></td>
			<td><?php echo $cmsPage['header']; ?></td>
			<td><?php echo $cmsPage['meta_title']; ?></td>
			<td><?php echo $cmsPage['meta_keyword']; ?></td>
			<td><?php echo $cmsPage['is_active']; ?></td>
			<td><?php echo $cmsPage['created']; ?></td>
			<td><?php echo $cmsPage['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'cms_pages', 'action' => 'view', $cmsPage['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'cms_pages', 'action' => 'edit', $cmsPage['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'cms_pages', 'action' => 'delete', $cmsPage['id']), array('confirm' => __('Are you sure you want to delete # %s?', $cmsPage['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Cms Page'), array('controller' => 'cms_pages', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
