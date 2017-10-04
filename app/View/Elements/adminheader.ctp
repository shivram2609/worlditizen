<?php $admin = $this->Session->read('Auth'); ?>
<div class="admin_header">
	<?php if (!empty($admin)) { 
		 $logo_img = $this->Html->image('logo.png',array('class'=>'logo_nothome'));
		 echo $this->Html->link($logo_img, array('controller'=>'users','action' => 'dashboard'), array('escape' => false));  
	 } else {
		echo $this->Html->image('logo.png',array('class'=>'logo_home')); 		 
	} ?>
	
    <?php if (!empty($admin)) {  ?>        
    <h2 class="user-name">Hi! <?php echo $this->Session->read("User.Userdetail.name"); ?>
            <?php echo $this->Html->link('Logout', SITE_LINK.'/logout'); ?></h2>
        <div class="clear"></div>
    <?php } ?>        
</div>
<div id="fade-whole" class='loading'></div>
<div class="flashMessage"></div>



 
 
