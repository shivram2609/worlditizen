 <section class="main-page inner-pageWhite-bg">
		<div class="container">
			<section class="form-outer">
				
				<?php echo $this->Form->create("User",array("novalidate"=>true)); ?>
					<div class="form-section">
						<h1 class="heading"><?php echo __("Forgot Password?");?></h1>					
						<p class="top-txt"><?php echo __("Enter your email below to receive your password reset instructions");?></p>
						<div class="form-group">
							<label><?php echo __("Email");?></label>
							<?php ?>
							<?php echo $this->Form->input("email",array("type"=>"text","maxlength"=>200,"class"=>"form-control","div"=>false,"label"=>false)); ?>
						</div>
						
					</div>
					<button type="submit" class="btn btn-large"><?php echo __("Send Password");?>  &nbsp; <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
				<?php echo $this->Form->end(); ?>
			</section>
		</div>
    </section>
