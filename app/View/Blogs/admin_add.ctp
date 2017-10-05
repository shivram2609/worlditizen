<div class="blogs form">
<?php echo $this->Form->create('Blog',array("novalidate"=>true)); ?>
	<fieldset>
		<legend><?php echo __('Add Blog'); ?></legend>
	<?php
		echo $this->Form->input('language_id');
		echo $this->Form->input('title');
		echo $this->Form->input('content');
		echo $this->Form->input('meta_title');
		echo $this->Form->input('meta_keyword');
		echo $this->Form->input('url');
		echo $this->Form->input('is_active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php echo $this->Html->script("ckeditor/ckeditor"); //BlogContent ?>
<script>
$(document).ready(function() { CKEDITOR.replace( 'BlogContent'); });
</script>
