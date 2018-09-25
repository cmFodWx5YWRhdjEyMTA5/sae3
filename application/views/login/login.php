

				<form class="login-form" action="<?php echo base_url('login/login');?>" method="post" autocomplete="off">
					<div class="card mb-0">
						<div class="card-body">
							<div class="text-center mb-3">
								<i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
								<h5 class="mb-0">Ingresar</h5>


								<?php if(isset($error_message)){?>
								<div class="alert alert-danger border-0 alert-dismissible">
									<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
									<span class="font-weight-semibold"></span> <?php echo $error_message;?>
							    </div>
								<?php }else{?>
								<span class="d-block text-muted">Código y Contraseña son necesarios</span>
								<?php }?>

							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="text" name="codigo" class="form-control" placeholder="Código" autofocus>
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="password" name="password" class="form-control" placeholder="Contraseña">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block">Ingresar <i class="icon-circle-right2 ml-2"></i></button>
							</div>

							<div class="text-center">
								<a href="<?php echo base_url('login/recovery'); ?>">Olvido su Contraseña? </a>
							</div>
						</div>
					</div>
				</form>
				<!-- /login form -->




