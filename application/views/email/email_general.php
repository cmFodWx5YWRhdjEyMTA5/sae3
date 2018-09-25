<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="viewport" content="width=device-width" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>SAE 3.0 Email</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/email.css" />
</head>
<body bgcolor="#FFFFFF">
<table class="head-wrap" bgcolor="#999999">
	<tr>
		<td></td>
		<td class="header container">
				<div class="content">
					<table bgcolor="#999999">
					<tr>
						<td><img src="<?php echo base_url();?>global_assets/images/logo.png " width="200" /></td>
						<td align="right"><h6 class="collapse"> sae 3.0 </h6></td>
					</tr>
				</table>
				</div>
		</td>
		<td></td>
	</tr>
</table>
<table class="body-wrap">
	<tr>
		<td></td>
		<td class="container" bgcolor="#FFFFFF">
			<div class="content">
			<table>
				<tr>
					<td>
						<h3><?php echo $title; ?></h3>
						<p class="lead"><?php echo $head;?></p>
						<p class="callout">
							<?php echo $accion;?>
						</p><!-- /Callout Panel -->
						<p><?php echo $pie?></p>			
						<br/>
						<br/>							
						<table class="social" width="100%">
							<tr>
								<td>
									<table align="left" class="column">
										<tr>
											<td>
												<h5 class="">Síguenos:</h5>
												<p class="">
													<a href="https://www.facebook.com/colegiofuentedevida/" class="soc-btn fb">Facebook</a> 
													<a href="https://twitter.com/cecfuentedevida" class="soc-btn tw">Twitter</a> 
													<a href="https://www.youtube.com/channel/UC_79iNCeTuYPLeCQ-K_VYWg" class="soc-btn gp">YouTube</a>
												</p>
											</td>
										</tr>
									</table>
									<table align="left" class="column">
										<tr>
											<td>				
																			
												<h5 class="">Contáctenos:</h5>												
												<p>PBX: <strong>2277 5656</strong><br/>
                								Email: <strong><a href="emailto:info@fuentedevida.edu.gt">info@fuentedevida.edu.gt</a></strong></p>
                
											</td>
										</tr>
									</table>
									<span class="clear"></span>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			</div>
		</td>
		<td></td>
	</tr>
</table>
<table class="footer-wrap">
	<tr>
		<td></td>
		<td class="container">
				<div class="content">
				<table>
				<tr>
					<td align="center">
						<p class="social">Todos los derechos reservados. SAE 3.0</p>
					</td>
				</tr>
			</table>
				</div>
		</td>
		<td></td>
	</tr>
</table>
</body>
</html>