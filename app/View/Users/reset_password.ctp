 <section class="main-page inner-pageWhite-bg">
		<div class="container">
			<section class="form-outer">
				<?php echo $this->Form->create("User",array("novalidate"=>true)); ?>
					<div class="form-section">
						<h1 class="heading"><?php echo __("Reset Password?");?></h1>					
						<p class="top-txt"></p>
						<div class="form-group">
							<label><?php echo __("Password");?></label>
							      <?php echo $this->Form->input("password",array("type"=>"password","maxlength"=>200,"class"=>"form-control","div"=>false,"label"=>false)); ?>
							<label><?php echo __("Confirm Password");?></label>    
							       <?php echo $this->Form->input("confirm_password",array("type"=>"password","maxlength"=>200,"class"=>"form-control","div"=>false,"label"=>false)); ?>  
						</div>	
					</div>
						<button type="submit" class="btn btn-large"><?php echo __("Reset");?>  &nbsp; <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
				<?php echo $this->Form->end(); ?>
			</section>
		</div>
  </section>
