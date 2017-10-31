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
    <?php echo $this->Html->css(array("bootstrap.min","bootstrap-select.min","font-awesome.min","jquery-ui.min","style_users")); ?>
    <!-- Custom Fonts -->
    
</head>

<body>
<header>
	<div class="container navbar">
		<label>
			<input type='checkbox'>
			<span class='menu'> <span class='hamburger'></span> </span>
			<ul>
			  <li> <a href='#'>Home</a> </li>
			  <li> <a href='#'>About</a> </li>
			  <li> <a href='#'>Contact</a> </li>
			</ul>
		</label>
		<div class="user-section"><a href="logout/" title="User">Logout<img src="img/user-icon.png" alt="user login" width="31" height="31"></a></div>
		<div class="text-center"><img src="img/home-logo.png" alt="World Citizen" width="350" height="200" class="img-responsive"></div>
	</div>
</header>

<section class="main-container">
		<?php echo $this->element("user_breadcrumbs"); ?>
		<div class="container">
				<?php echo $this->element("user_left"); ?>
				<div class="panelToggle">
					<span>
						<i class="fa fa-bars"></i>
					</span>
				</div>
				<?php echo $content_for_layout; ?>
		</div>
    </section>

<footer class="inner-footer">
		&copy; 2017 World Citizen. All Rights Reserved.
		<div class="pull-right"><a href="index.html" title="Contact">Contact</a> | 
		<a href="javascript:void(0);" title="Help">Help</a> | 
		<a href="javascript:void(0);" title="Home">Home</a>
		</div>
	</footer>

    
    

    <!-- jQuery -->
    <?php echo $this->Html->script(array("jquery.min","bootstrap.min","bootstrap-select.min","jquery.ui.min")); ?>
    <script type="text/javascript">
		//$("#flashMessage").hide();
		$(document).ready(function(){
			if ( $("#flashMessage") ) { 
				setTimeout(function() { $("#flashMessage").hide(); } , 5000);
			}
		});
    </script>
       <script>
  $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  </script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <?php echo $this->Html->script(array("scrollreveal.min","custom")); ?>
    <script>
		$(function(){
    $('.selectpicker').selectpicker();
});

$(document).ready(function(){
$(".panelToggle").click(function(){
    $(".left-Navbar").toggleClass("width0px width200px");
	$("i",this).toggleClass("fa-bars fa-times");
	$(".userContent").toggleClass("padding0 padding200");
	$(".userNameSpan").toggleClass("show hide");
	$(".userMenu span").toggleClass("show hide");
	$(".userMenu ul").toggleClass("showI2");
	//$(".userMenu ul i").toggleClass("fa-bars fa-times");
});
});
	</script>

</body>

</html>
