<div class="emailTemplates form">
<?php echo $this->Form->create('EmailTemplate',array("novalidate"=>true)); ?>
	<fieldset>
		<legend><?php echo __('Edit EmailTemplate'); ?></legend>
	<?php
	    echo $this->Form->input('id');
		echo $this->Form->input('language_id');
		echo $this->Form->input('header');
		echo $this->Form->input('subject');
		echo $this->Form->input('email_from');
		echo $this->Form->input('content', array("type"=>"textarea"));
		
		?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php echo $this->Html->script("ckeditor/ckeditor"); //EmailTemplateContent ?>
<script>
$(document).ready(function() { CKEDITOR.replace( 'EmailTemplateContent'); });
</script>


