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
    <?php echo $this->Html->css(array("bootstrap.min","bootstrap-select.min","font-awesome.min","style")); ?>
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="<?php echo DEFAULT_LINK; ?>"><img src="img/inner-page-log.png" class="img-responsive" alt="World Citizen" width="244" height="53"></a>
			</div>
			<div class="social-icon">
				<?php echo __("Follow Us On:");?><br>
				<a href="javascript:void(0);" title="Facebook"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
				<a href="javascript:void(0);" title="Youtube"><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
				<a href="javascript:void(0);" title="Google plus"><i class="fa fa-google-plus-official" aria-hidden="true"></i></a>
				<a href="javascript:void(0);" title="rss"><i class="fa fa-rss-square" aria-hidden="true"></i></a>
				<a href="javascript:void(0);" title="Twitter"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
				<a href="javascript:void(0);" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>

			</div>
           
        </div>
		 <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<div class="container">
					<ul class="nav navbar-nav">
						<?php //print_r($staticPages); die; ?>
						
							
						<li class="active">
							<a href="<?php echo DEFAULT_LINK; ?>" title="Home">Home</a>
						</li>
						<li>
							<a href="about-us" title="About">About Us</a>
						</li>
						<li>
							<a href="ambassador" title="Ambassador">Ambassador</a>
						</li>
						<li>
							<a href="declaration" title="Declaration">Declaration</a>
						</li>
						<li>
							<a href="milestones" title="Milestones and Participation">Milestones and Participation</a>
						</li>
						<li>
							<a href="javascript:void(0);" title="WC Stats">WC Stats</a>
						</li>
						<li>
							<a href="javascript:void(0);" title="<?php echo __("Blogs");?>"><?php echo __("Blogs");?></a>
						</li>
						<li>
							<a href="javascript:void(0);" title="<?php echo __("ContacT Us");?>"><?php echo __("ContacT Us");?></a>
						</li>
						<li>
							<a href="javascript:void(0);" title="<?php echo __("FAQ’s");?>"><?php echo __("FAQ’s");?></a>
						</li>
						
					</ul>
				</div>
            </div>
            <!-- /.navbar-collapse -->
        <!-- /.container-fluid -->
    </nav>
    <?php echo $content_for_layout; ?>
	<footer class="inner-footer">
		<?php echo __("© 2017 World Citizen. All Rights Reserved.");?><br>
		<a href="index.html" title="Home">Home</a> | 
		<a href="javascript:void(0);" title="About">About</a> | 
		<a href="javascript:void(0);" title="Ambassador">Ambassador</a> | 
		<a href="javascript:void(0);" title="Declaration">Declaration</a> | 
		<a href="javascript:void(0);" title="Milestones and Participation">Milestones and Participation</a> | 
		<a href="javascript:void(0);" title="WC Stats">WC Stats</a> | 
		<a href="javascript:void(0);" title="Blogs"><?php echo __("Blogs");?></a> | 
		<a href="javascript:void(0);" title="ContacT Us"><?php echo __("ContacT Us");?></a> | 
		<a href="javascript:void(0);" title="FAQ’s"><?php echo __("FAQ’s");?></a>
	</footer>

    
    
	<?php $this->Html->script(array("jquery.min","bootstrap.min","bootstrap-select")); ?>
    
    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    
    <?php echo $this->Html->script(array("scrollreveal.min","custom")); ?>
    <!-- Theme JavaScript -->
    <script>
		$(function(){
    $('.selectpicker').selectpicker();
});
	</script>

</body>

</html>
