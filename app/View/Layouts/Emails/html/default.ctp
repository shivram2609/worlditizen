<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta name="description" content="">
        <title><?php echo "WorldCitizen"; ?></title>
	</head>
    <body>
        <div style="width:700px; margin:auto; font-family:arial; font-size:15px; color:#333333; line-height:18px;">
			<a href="<?php echo SITE_LINK; ?>" style="display:inherit;background-color:#333;"><img src="<?php echo SITE_LINK; ?>img/inner-page-log.png" alt="<?php echo "WorldCitizen"; ?>" title="<?php echo "SwankCook"; ?>" border="0" style="margin:10px;"></a>
			 <div style="margin:auto; border:1px solid #ccc; height:auto; border-bottom:none; padding:15px; margin:0px; font-family:arial; font-size:15px; color:#333333; line-height:18px;" >
				<?php echo $this->fetch('content');?>
			</div>
			<div style="margin:auto; padding:15px; border:1px solid #ccc; border-top:none;"><br>
				<p style="font-family:arial; font-size:15px; color:#333333; line-height:18px; margin:0px;"><b>Best Regards,</b><br>
				<a href="<?php echo SITE_LINK; ?>" style="color:#1B9ED5; text-decoration:none;" >Team <?php echo "WorldCitizen"; ?></a>.</p><br>
			</div>
			<div style="margin:auto; padding:10px; margin:0px; text-align:center; font-family:arial; font-size:12px; color:#333333; line-height:18px;" >
				All content &copy; <?php echo date("Y"); ?> by <?php echo "WorldCitizen"; ?>. All rights reserved.
			</div>
		</div>
	</body>
</html>
