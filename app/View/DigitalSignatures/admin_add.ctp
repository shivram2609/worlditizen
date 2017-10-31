<div class="digitalSignatures form">
<?php echo $this->Form->create('DigitalSignature',array("novalidate"=>true)); ?>
	<fieldset>
		<legend><?php echo __('Add Digital Signature'); ?></legend>
	<?php
	    echo $this->Form->input('id');
		echo $this->Form->input('language_id');
		echo $this->Form->input('content',array("type"=>"textarea"));
		echo $this->Form->input('is_active',array("type"=>"checkbox"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<?php echo $this->Html->script("ckeditor/ckeditor"); ?>
<script>
$(document).ready(function() { CKEDITOR.replace( 'DigitalSignatureContent'); });
</script>

