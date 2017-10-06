<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>World Citizen</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-select.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <section class="main-page">
		<div class="text-center"><img src="img/home-logo.png" alt="World Citizen" width="504" height="367" class="img-responsive"></div>
        <div class="header-content">
            <div class="header-content-inner">
                <div class="heading"><?php echo __("Read"); ?><span><?php echo __("The Social Contract"); ?></span></div>
				<p><a href="javascript:void(0);" title="<?php echo __("CLICK HERE"); ?>" data-toggle="modal" data-target="#myModal"><?php echo __("CLICK HERE"); ?></a></p>
            </div>
			<div class="row">
				<div class="col-sm-6">
					<div class="header-content-inner">
						<div class="heading heading2"><?php echo __("Learn More");?><span><?php echo __("about Social Contract"); ?></span></div>
						<p><a href="javascript:void(0);" title="<?php echo __("CLICK HERE"); ?>"><?php echo __("CLICK HERE"); ?></a></p>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="header-content-inner">
						<div class="heading heading3"><?php echo __("Ready to Sign");?><span><?php echo __("The Social Contract"); ?></span></div>
						<p><a href="<?php echo SITE_LINK."login"; ?>" title="<?php echo __("CLICK HERE"); ?>"><?php echo __("CLICK HERE"); ?></a></p>
					</div>
				</div>
			</div>
			<?php echo $this->Form->create("Page"); ?>
			<div class="form-group">
				<p><?php echo __("Choose your language");?></p>
				<?php echo $this->Form->input("language",array("options"=>$languages,"class"=>"selectpicker","div"=>false,"label"=>false)); ?>
			</div>
			<?php echo $this->Form->end(); ?>
        </div>
    </section>
	<footer><?php echo __("© 2017 World Citizen. All Rights Reserved.");?></footer>

    
    
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-heading">The World Citizen <span>Social Contract</spa></h4>
          <p>I recognize humanity's birth right to live on this planet according to Natural Law and hereby SERVE NOTICE of my LAWFUL STATUS as a World Citizen.</p>
			<p>By doing so, all such contracts injurious to my birth right are hereby DECLARED NULL AND VOID.</p>
			<p>From this day forward I commit to the Golden Rule and AFFIRM MY OBLIGATIONS to honour The Golden Rule., in doing so I will;</p>
        </div>
        <ul class="modal-list">
          <li>Respect and protect my own Natural Rights without exception.</li>
		  <li>Respect and protect the Natural Rights of every other human being</li>
		  <li>Respect and protect planet Earth for future generations.</li>
        </ul>
      </div>
      
    </div>
  </div>
  
    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/scrollreveal.min.js"></script>
    <!-- Theme JavaScript -->
    <script src="js/custom.js"></script>
    <script>
		$(function(){
    $('.selectpicker').selectpicker();
});
	</script>
<script>
	$(document).ready( function(){
			$("#PageLanguage").on("change",function() { $("#PageIndexForm").submit(); });
	});
</script>
</body>

</html>
