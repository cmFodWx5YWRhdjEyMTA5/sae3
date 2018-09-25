				<form class="login-form" action="<?php echo base_url('login/send');?>" method="post" autocomplete="off">
					<div class="card mb-0">
						<div class="card-body">
							<div class="text-center mb-3">
								<i class="icon-spinner11 icon-2x text-warning border-warning border-3 rounded-round p-3 mb-3 mt-1"></i>
								<h5 class="mb-0">Recuperar Contraseña</h5>
								<?php if(isset($error_message)){?>
								<div class="alert alert-<?php echo $tipo;?> border-0 alert-dismissible">
									<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
									<span class="font-weight-semibold"></span> <?php echo $error_message;?>
							    </div>
								<?php }else{?>
								<span class="d-block text-muted">Recibirá la contraseña en su correo electrónico</span>
								<?php }?>								
								
							</div>

							<div class="form-group form-group-feedback form-group-feedback-right">
								<input type="email" name="correo" class="form-control" placeholder="Correo">
								<div class="form-control-feedback">
									<i class="icon-mail5 text-muted"></i>
								</div>
							</div>
							<div class="form-group form-group-feedback form-group-feedback-right">
								<input type="text" name="codigo" class="form-control" placeholder="Código">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn bg-blue btn-block"><i class="icon-spinner11 mr-2"></i> Recuperar contraseña</button>
							</div>
							<div class="text-center">
								<a href="<?php echo base_url('login'); ?>">Iniciar Sesión </a>
							</div>
						</div>
					</div>
				</form>