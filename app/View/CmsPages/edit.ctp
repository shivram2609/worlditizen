<div class="cmsPages form">
<?php echo $this->Form->create('CmsPage'); ?>
	<fieldset>
		<legend><?php echo __('Edit Cms Page'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('language_id');
		echo $this->Form->input('slug');
		echo $this->Form->input('seo_url');
		echo $this->Form->input('header');
		echo $this->Form->input('meta_title');
		echo $this->Form->input('meta_keyword');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('CmsPage.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('CmsPage.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Cms Pages'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Languages'), array('controller' => 'languages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Language'), array('controller' => 'languages', 'action' => 'add')); ?> </li>
	</ul>
</div>
