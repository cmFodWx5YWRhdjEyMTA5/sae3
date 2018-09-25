<?php 
$codigo = $this->session->userdata('codigo');
$nombre = $this->session->userdata('nombre');
$apellido = $this->session->userdata('apellido');
?>
				<form class="login-form" action="<?php echo base_url('panel/validar_token');?>" method="post" autocomplete="off">
					<div class="card mb-0">
						<div class="card-body">
							<input type="hidden" id="token" value="<?php echo $token;?>" />
							<div class="text-center mb-3">
								<h6 class="font-weight-semibold mb-0"><?php echo $nombre.' '.$apellido ?></h6>
								<span class="d-block text-muted">Token de seguridad </span>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-right">
								<input type="password" name="token" class="form-control" placeholder="123456" autofocus>
								<div class="form-control-feedback">
									<i class="icon-user-lock text-muted"></i>
								</div>
							</div>

							<div class="form-group d-flex align-items-center">
								<a href="<?php echo base_url('panel/tokenemail');?>" >Enviar por Correo</a>
								<a href="<?php echo base_url('panel/tokensms');?>" class="ml-auto">Volver a Enviar</a>
							</div>
							<button type="submit" class="btn btn-primary btn-block"><i class="icon-unlocked mr-2"></i> Desbloquear</button>
						</div>
					</div>
				</form>