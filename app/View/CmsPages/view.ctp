<div class="cmsPages view">
<h2><?php echo __('Cms Page'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cmsPage['CmsPage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Language'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cmsPage['Language']['name'], array('controller' => 'languages', 'action' => 'view', $cmsPage['Language']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo h($cmsPage['CmsPage']['content']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($cmsPage['CmsPage']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Seo Url'); ?></dt>
		<dd>
			<?php echo h($cmsPage['CmsPage']['seo_url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Header'); ?></dt>
		<dd>
			<?php echo h($cmsPage['CmsPage']['header']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Title'); ?></dt>
		<dd>
			<?php echo h($cmsPage['CmsPage']['meta_title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Meta Keyword'); ?></dt>
		<dd>
			<?php echo h($cmsPage['CmsPage']['meta_keyword']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Active'); ?></dt>
		<dd>
			<?php echo h($cmsPage['CmsPage']['is_active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($cmsPage['CmsPage']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($cmsPage['CmsPage']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cms Page'), array('action' => 'edit', $cmsPage['CmsPage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cms Page'), array('action' => 'delete', $cmsPage['CmsPage']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $cmsPage['CmsPage']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Cms Pages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cms Page'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Languages'), array('controller' => 'languages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Language'), array('controller' => 'languages', 'action' => 'add')); ?> </li>
	</ul>
</div>
