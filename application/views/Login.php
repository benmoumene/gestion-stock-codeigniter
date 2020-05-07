<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100">
			<form class="login100-form validate-form" role="form" action="<?php echo base_url(); ?>Login/login"
				  method="post">
					<span class="login100-form-title p-b-34">
						Connexion
					</span>

				<span class="w-full text-center text-danger">
						<?php
						if (isset($error_msg)) {
							echo $error_msg;
						}
						?>
					</span>
				<span class="w-full text-center text-success">
						<?php
						if (isset($success_message)) {
							echo $success_message;
						}
						?>
					</span>


				<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20"
					 data-validate="Entrer votre nom d'utilisateur">
					<input id="username" class="input100" type="text" name="username" placeholder="Nom d'utilisateur">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20"
					 data-validate="Entrer votre mots de passe">
					<input id="pass" class="input100" type="password" name="pass" placeholder="Mots de passe">
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn">
						Se connecter
					</button>
				</div>

				<div class="w-full text-center p-t-27 p-b-239">
					<a href="#" class="txt2">
						Nom d'utilisateur / mots de passe
					</a>
					<span class="txt1">
							oublié ?
						</span>
				</div>
			</form>
			<div class="login100-more"
				 style="background-image: url(<?php echo site_url('assets/login_v17/images/logo.png') ?>);"></div>
		</div>
	</div>
</div>


<div id="dropDownSelect1"></div>
