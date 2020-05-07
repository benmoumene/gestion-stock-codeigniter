<div class="wrapper">
	<div class="content-wrapper">
		<section class="content-header">
			<h1>
				<i class="fas fa-user-cog"></i>
				Mon profil
			</h1>
			<ol class="breadcrumb">
				<?php if ($this->session->type == 'admin') { ?>
					<li><a href="<?php echo site_url('admin'); ?>"><i class="fas fa-home"></i> Home</a></li>
				<?php } else { ?>
					<li><a href="<?php echo site_url('gestion'); ?>"><i class="fas fa-home"></i> Home</a></li>
				<?php } ?>
				<li class="active">Compte</li>
			</ol>
		</section>
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="">
					<div class="box box-default">
						<div class="box-body">
							<span class="w-full text-center text-success">
								<?php
								if (isset($success_message)) {
									echo $success_message;
								}
								?>
							</span>
							<form class="form-horizontal" action="<?php echo base_url('setting/parametre'); ?>"
								  method="post">
								<input type="hidden" name="id_user" value="<?php echo $user_param->id_user; ?>">

								<div class="form-group">
									<label class="col-sm-3 control-label">Nom</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="nom" id="nom"
											   value="<?php echo $user_param->nom; ?>">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Prénom(s)</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="prenom" id="prenom"
											   value="<?php echo $user_param->prenom; ?>">
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Adresse</label>
									<div class="col-sm-9">
										<textarea class="form-control" rows="3" name="adresse"
												  id="adresse"><?php echo $user_param->adresse; ?></textarea>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">N° CIN</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="cin" id="cin"
											   value="<?php echo $user_param->cin; ?>" readonly>
										<span class="text-danger">
											<?php echo form_error('cin'); ?>
										</span>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Nom d'utilisateur</label>
									<div class="col-sm-9">
										<input type="text" class="form-control" name="username" id="username"
											   value="<?php echo $user_param->username; ?>" readonly>
										<span class="text-danger">
											<?php echo form_error('username'); ?>
										</span>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Mots de passe</label>
									<div class="col-sm-9">
										<input type="password" class="form-control" name="password" id="password"
											   placeholder="Veuillez saisir votre mots de passe">
										<span class="text-danger">
											<?php echo form_error('password'); ?>
										</span>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-3 control-label">Type</label>
									<div class="col-sm-9">
										<?php if ($this->session->type == 'gestionnaire') {
											; ?>
											<input type="text" class="form-control" name="type" id="type"
												   value="<?php echo $user_param->type; ?>" readonly>
										<?php } elseif ($this->session->type == 'admin') {
											; ?>
											<select class="form-control select2" name="type" id="type"
													style="width: 100%;"><?php echo $user_param->type; ?>
												<option value="admin">admin</option>
												<option value="gestionnaire">gestionnaire</option>
											</select>
										<?php }; ?>
									</div>
								</div>

								<div class="form-group text-right">
									<div class="col-sm-offset-2 col-sm-10">
										<button type="submit" id="update_param" class="btn btn-success">Enregistrer les
											modifications
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>

