<div class="cmsPages form">
<?php echo $this->Form->create('CmsPage',array("novalidate"=>true)); ?>
	<fieldset>
			<legend><?php echo __('Edit CmsPage'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('language_id');
		echo $this->Form->input('content');
		echo $this->Form->input('slug');
		echo $this->Form->input('seo_url');
		echo $this->Form->input('header');
		echo $this->Form->input('meta_title');
		echo $this->Form->input('meta_keyword');
		echo $this->Form->input('is_active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php echo $this->Html->script("ckeditor/ckeditor"); //CmsPageContent ?>
<script>
$(document).ready(function() { CKEDITOR.replace( 'CmsPageContent'); });
</script>
