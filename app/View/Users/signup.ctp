<section class="main-page inner-pageWhite-bg">
	<div class="container">
		<section class="form-outer">
			<?php echo $this->Form->create("User", array("novalidate"=>true,"type"=>"file")); ?>
			<div class="form-section">
				<?php //echo $step; ?>
				<h1 class="heading"><?php echo __("Sign Up");?></h1>
				<?php if ( $step == 1 || $step == 2 || $step == 3) {  ?>					
				<?php $display = (($step == 1)?"inline":"none"); ?>
				<p class="top-txt"><?php echo __("Personal Information");?></p>
				<div class="row" style="display:<?php echo $display; ?>;">
				<?php if ($step == 1){ echo $this->Form->hidden("step",array("value"=>1)); } ?>
					<div class="form-group">
						<label><?php echo __("Email");?></label>
						<?php echo $this->Form->input("User.username",array("type"=>"text","maxlength"=>100,"class"=>"form-control","div"=>false,"label"=>false)); ?>
					</div>
					<div class="form-group">
						<label><?php echo __("Password");?></label>
						<?php echo $this->Form->input("User.password",array("type"=>"password","maxlength"=>100,"class"=>"form-control","div"=>false,"label"=>false)); ?>
					</div>
					<div class="form-group">
						<label><?php echo __("Confirm Password");?></label>
						<?php echo $this->Form->input("User.confirm_password",array("type"=>"password","maxlength"=>100,"class"=>"form-control","div"=>false,"label"=>false)); ?>
					</div>
					<button type="submit" class="btn btn-large" id="sub1"><?php echo __("continue");?>  &nbsp; <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
				</div>
				<?php } if ($step == 2 || $step == 3) { ?>
				<?php $display = (($step == 2)?"inline":"none"); ?>
				
				<div class="row" style="display:<?php echo $display; ?>;">
				<?php if ($step == 2){ echo $this->Form->hidden("step",array("value"=>2)); } ?>
							<?php $temp =  $aprovalForm['DigitalSignature']['content']; 
					$temp = str_replace("{CLIENTNAME}",$this->Form->input('clientname',array("div"=>false,"label"=>false)),$temp);
					$temp = str_replace("{CLIENTSIGNATURE}",$this->Form->file('tempclientsignature',array("div"=>false,"label"=>false)),$temp);
					$temp = str_replace("{DATE}",date("Y-m-d"),$temp);
					echo $temp;
					?>

				<a href="<?php echo SITE_LINK."signup/1"; ?>">
				<button type="button" class="btn btn-large" id="sub2" ><?php echo __("Back");?>  &nbsp; <i class="fa fa-arrow-left" aria-hidden="true" ></i></button>
				</a>	
				<button type="submit" class="btn btn-large" id="sub2" ><?php echo __("continue");?>  &nbsp; <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
				</div>
				<?php } if ($step == 3) {?>
				<?php $display = (($step == 3)?"inline":"none"); ?>
				
				<div class="row" style="display:<?php echo $display; ?>; color:#3e2528;">
				<?php if ($step == 3){ echo $this->Form->hidden("step",array("value"=>3)); } ?>
				<?php if ($step == 3){ echo $this->Form->hidden("User.clientsignature"); } ?>
					<div class="col-sm-6 form-group">
						<label><?php echo __("Name");?></label>
							<?php echo $this->Form->input("UserDetail.name",array("type"=>"text","maxlength"=>200,"class"=>"form-control","div"=>false,"label"=>false)); ?>
					</div>
					<div class="col-sm-6 form-group">
					<label><?php echo __("Phone");?></label>
					<?php echo $this->Form->input("UserDetail.phone",array("type"=>"text","maxlength"=>100,"class"=>"form-control","div"=>false,"label"=>false)); ?>
					</div>
				</div>

					<div class="col-sm-10 form-group">
						<label><?php echo __("Address 1");?></label>
							<?php echo $this->Form->input("UserDetail.address1",array("type"=>"text","maxlength"=>100,"class"=>"form-control","div"=>false,"label"=>false)); ?>
					</div>
				<div class="row" style="display:<?php echo $display; ?>;">
					<div class="col-sm-4 form-group">
						<label><?php echo __("City");?></label>
						<?php echo $this->Form->input("UserDetail.city",array("type"=>"text","maxlength"=>100,"class"=>"form-control","div"=>false,"label"=>false)); ?>
					</div>
					<div class="col-sm-4 form-group">
						<label><?php echo __("State");?></label>
						<?php echo $this->Form->input("UserDetail.State",array("options"=>$locations,"empty"=>"Select location","class"=>"selectpicker","label"=>false,"div"=>false)); ?>
					</div>
					<div class="col-sm-4 form-group">
						<label><?php echo __("Zip");?></label>
						
							<?php echo $this->Form->input("UserDetail.zip",array("type"=>"text","maxlength"=>100,"class"=>"form-control","div"=>false,"label"=>false)); ?>
					</div>
				</div>
					    <a href="<?php echo SITE_LINK."signup/2"; ?>">
						<button type="button" class="btn btn-large"><?php echo __("Back");?>  &nbsp; <i class="fa fa-arrow-left" aria-hidden="true" ></i></button>				       
						</a>        
						<button type="submit" class="btn btn-large" id="sub3" disabled><?php echo __("Sign Up");?>  &nbsp; <i class="fa fa-arrow-right" aria-hidden="true" ></i></button> &nbsp;  <label for="terms"><input type="radio" id="terms"> <?php echo __("I agree to");?> <a href="" title="<?php echo __("Terms of Services");?>"data-toggle="modal" data-target="#myModal" ><?php echo __("Terms of Services");?></a></label>
						
						
						
			<?php } ?>	

			<?php echo $this->Form->end(); ?>
		    </div>
		</section>
		
<!-- Modal -->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog modal-lg">

	<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-body">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-heading"><?php echo __("The World Citizen");?> <span><?php echo __("Social Contract"); ?></span></h4>
				<p><?php echo __("I recognize humanity's birth right to live on this planet according to Natural Law and hereby SERVE NOTICE of my LAWFUL STATUS as a World Citizen.");?></p>
				<p><?php echo __("By doing so, all such contracts injurious to my birth right are hereby DECLARED NULL AND VOID.");?></p>
				<p><?php echo __("From this day forward I commit to the Golden Rule and AFFIRM MY OBLIGATIONS to honour The Golden Rule., in doing so I will;");?></p>
				</div>
				<ul class="modal-list">
				<li><?php echo __("Respect and protect my own Natural Rights without exception.");?></li>
				<li><?php echo __("Respect and protect the Natural Rights of every other human being");?></li>
				<li><?php echo __("Respect and protect planet Earth for future generations.");?></li>
				</ul>
			</div>

		</div>
	</div>
	</div>
</section>






