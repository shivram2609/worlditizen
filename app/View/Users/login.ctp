<section class="main-page inner-pageWhite-bg">
	<div class="container">
		<section class="form-outer">
			<?php echo $this->Form->create("User", array("novalidate"=>true)); ?>
				<div class="form-section">
					<h1 class="heading"><?php echo __("Sign In");?></h1>					
					<p class="top-txt"><?php echo __("Don’t have an account?");?> <a href="#" title="<?php echo __("Sign Up Now");?>"><?php echo __("Sign Up Now");?></a>,<?php echo __("It takes less than a minute");?> </p>
					<div class="form-group">
						<label><?php echo __("Email");?></label>
						<?php echo $this->Form->input("username",array("type"=>"text","maxlength"=>100,"class"=>"form-control","div"=>false,"label"=>false)); ?>
						
					</div>
					<div class="form-group">
						<label><?php echo __("Password");?></label>
						<?php echo $this->Form->input("password",array("type"=>"password","maxlength"=>100,"class"=>"form-control","div"=>false,"label"=>false)); ?>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<?php echo $this->Form->input("remember",array("type"=>"checkbox","div"=>false,"label"=>false)); ?>
							<label for="remember"><?php echo __("Remember Me");?> </label>				
						</div>
						<div class="col-sm-6 text-right">
							<a href="#" title="<?php echo __("Forgot Password?");?>"><?php echo __("Forgot Password?");?></a>				
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-large"><?php echo __("Sign In");?>  &nbsp; <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
			<?php echo $this->Form->end(); ?>		
		</section>
	</div>
</section>
	
