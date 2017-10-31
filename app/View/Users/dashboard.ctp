<div class="userContent">
	 <div class="col-sm-12">
		<div class="form-setion1">
		<?php echo $this->Form->create("UserDetail", array("novalidate"=>true,"type"=>"file")); ?>						
				<div class="row form-group border-bottom">
					<div class="col-sm-4">
						<label class="label-right"><?php echo __("Status Message:");?></label>
					</div>
						<div class="col-sm-8">
							<?php echo $this->form->input("UserDetail.Status",array("type"=>"textarea","class"=>"form-control","div"=>false,"label"=>false));?>
						</div>									
				</div>
				<div class="row form-group border-bottom">
					<div class="col-sm-4">
						<label class="label-right"><?php echo __("Avatar:");?></label>
					</div>
					<div class="col-sm-8">
						<label class="btn-bs-file no-padding">
							<img src="img/thumbnail.png" alt="Upload">
							<?php echo $this->Form->input("image",array("type"=>"file","label"=>false,"div"=>false)); ?>
						</label>
						<small>Click the image to change your avatar.</small>
					</div>									
				</div>
				<div class="row form-group border-bottom">
					<div class="col-sm-4">
						<label class="label-right"><?php echo __("Gender:");?></label>
					</div>
					<div class="col-sm-8 form-labeled">
						        <?php echo $this->form->input("UserDetail.Gender",array("type"=>"radio","class"=>"form-control","options"=>array("Male","Female","Unspecified"),"div"=>false,"label"=>false,'legend' => false,'fieldset' => false));?>
					</div>									
				</div>
				<div class="row form-group border-bottom">
					<div class="col-sm-4">
						<label class="label-right"><?php echo __("Date of Birth:");?></label>
					</div>
					<div class="col-sm-8 form-labeled">
						 <?php echo $this->Form->input("UserDetail.dob", array("type"=>"text","id"=>"datepicker",'label'=>false , "div"=>false));?>
						 
						<label for="dm">Show day and month of birth</label>
						 <?php echo $this->Form->input("UserDetail.dm",array ("type"=>"checkbox","class"=>"form-control","label"=>false,"div"=>false));?> 
						<label for="y"> Show year of birth</label>
						     <?php echo $this->Form->input("UserDetail.y",array ("type"=>"checkbox","class"=>"form-control","label"=>false,"div"=>false));?> 
						
					</div>									
				</div>
				<div class="row border-bottom">
					<div class="col-sm-12">
						<div class="row form-group">
							<div class="col-sm-4">
								<label class="label-right"><?php echo __("Location:");?></label>
							</div>
							<div class="col-sm-8">
								<?php echo $this->form->input("UserDetail.Location",array("type"=>"text","class"=>"form-control","placeholder"=>"Location","div"=>false,"label"=>false));?>
							</div>									
						</div>
						<div class="row form-group">
							<div class="col-sm-4">
								<label class="label-right"><?php echo __("Occupation:");?></label>
							</div>
							<div class="col-sm-8">
								<?php echo $this->form->input("UserDetail.Occupation",array("type"=>"text","class"=>"form-control","placeholder"=>"Occupation","div"=>false,"label"=>false));?>
							</div>									
						</div>
						<div class="row form-group">
							<div class="col-sm-4">
								<label class="label-right"><?php echo __("Home Page:");?></label>
							</div>
							<div class="col-sm-8">
								<?php echo $this->form->input("UserDetail.home",array("type"=>"text","class"=>"form-control","placeholder"=>"https://trello.com/b/Gz6wt9CJ/design-tasks","div"=>false,"label"=>false));?>
								
						    </div>									
						</div>
						<div class="row">
							<div class="col-sm-4">
								<label class="label-right"><?php echo __("About You:");?></label>
							</div>
							<div class="col-sm-8">
								<?php echo $this->form->input("UserDetail.about",array("type"=>"textarea","class"=>"form-control","div"=>false,"label"=>false));?>
								
							</div>									
						</div>
					</div>
				</div>
				<div class="text-right">
					<button class="btn btn-success"><?php echo __("SAVE CHANGES");?></button>
					
				</div>
			<?php echo $this->Form->end(); ?>	
		</div>
	 </div>
	 <div class="clearfix"></div>
</div>
