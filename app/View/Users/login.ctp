<section class="main-page inner-pageWhite-bg">
	<div class="container">
		<section class="form-outer">
			<?php echo $this->Form->create("User"); ?>
				<div class="form-section">
					<h1 class="heading">Sign In</h1>					
					<p class="top-txt">Don’t have an account? <a href="#" title="Sign Up Now">Sign Up Now</a>, It takes less than a minute </p>
					<div class="form-group">
						<label>Email</label>
						<?php echo $this->Form->input("username",array("type"=>"text","maxlength"=>100,"class"=>"form-control","div"=>false,"label"=>false)); ?>
						
					</div>
					<div class="form-group">
						<label>Password</label>
						<?php echo $this->Form->input("password",array("type"=>"password","maxlength"=>100,"class"=>"form-control","div"=>false,"label"=>false)); ?>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<?php echo $this->Form->input("remember",array("type"=>"checkbox","div"=>false,"label"=>false)); ?>
							<label for="remember">Remember Me</label>				
						</div>
						<div class="col-sm-6 text-right">
							<a href="#" title="Forgot Password?">Forgot Password?</a>				
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-large">Sign In  &nbsp; <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
			<?php echo $this->Form->end(); ?>		
		</section>
	</div>
</section>
	