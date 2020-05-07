<?php
$data['user'] = $user;
?>
<div class="wrapper">
	<div class="content-wrapper">
		<section class="content-header">
			<h1>
				<i class="fas fa-user"></i>
				Utilisateurs
			</h1>
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url('admin'); ?>"><i class="fas fa-home"></i> Home</a></li>
				<li class="active">Utilisateur</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-sm-3">
					<div class="box box-default">
						<div class="box-body">
							<form class="form-horizontal" action="<?php echo base_url(); ?>admin/user" method="post">
								<input type="hidden" id="action_user" name="action_user" value="ajout">
								<input type="hidden" name="id_user" id="id_user" value="">

								<div class="form-group">
									<div class="col-sm-12">
										<?php
										if (isset($success_message)) {
											echo $success_message;
										}
										?>
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-12">
										<input type="text" class="form-control" name="nom" id="nom" value=""
											   placeholder="Nom">
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-12">
										<input type="text" class="form-control" name="prenom" id="prenom" value=""
											   placeholder="Prénom(s)">
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-12">
										<textarea class="form-control" rows="3" name="adresse" id="adresse" value=""
												  placeholder="Adresse"></textarea>
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-12">
										<input type="text" class="form-control" name="cin" id="cin" value=""
											   placeholder="N° CIN">
										<span class="text-danger" id="cin_base">Le N° CIN existe déjà</span>
										<span class="text-danger">
											<?php echo form_error('cin'); ?>
										</span>
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-12">
										<input type="text" class="form-control" name="username" id="username" value=""
											   placeholder="Nom d'utilisateur">
										<span class="text-danger"
											  id="username_base">Le nom d'utilisateur existe déjà</span>
										<span class="text-danger">
											<?php echo form_error('username'); ?>
										</span>
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-12">
										<input type="password" class="form-control" name="password" id="password"
											   value="" placeholder="Mots de passe">
										<span class="text-danger">
											<?php echo form_error('password'); ?>
										</span>
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-12">
										<select class="form-control select2" name="type" id="type" style="width: 100%;">
											<option selected="selected">Type d'utilisateur</option>
											<option value="admin">admin</option>
											<option value="gestionnaire">gestionnaire</option>
										</select>
									</div>
								</div>

								<div class="form-group">
									<div class="col-sm-offset-0 col-sm-10">
										<input type="submit" id="save_user" class="btn btn-success" value="Enregistrer">
										<button type="submit" id="cancel_user" class="btn btn-danger">Annuller</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>

				<div class="col-sm-9">
					<div class="box box-default">
						<div class="box-body">
							<table class="table table-bordered table-striped tableau">
								<thead>
								<tr>
									<th class="column-title">Nom</th>
									<th class="column-title">Prénom(s)</th>
									<th class="column-title">Adresse</th>
									<th class="column-title">CIN</th>
									<th class="column-title">Nom d'utilisateur</th>
									<th class="column-title">Type</th>
									<th class="column-title">Action</th>
								</tr>
								</thead>

								<tbody>
								<?php
								foreach ($user

								as $row):
								$row = get_object_vars($row);
								$id_user = $row['id_user'];
								$nom = $row['nom'];
								$prenom = $row['prenom'];
								$adresse = $row['adresse'];
								$cin = $row['cin'];
								$username = $row['username'];
								$type = $row['type'];
								?>
								<tr>
									<td><?php echo $nom; ?></td>
									<td><?php echo $prenom; ?></td>
									<td><?php echo $adresse; ?></td>
									<td><?php echo $cin; ?></td>
									<td><?php echo $username; ?></td>
									<td><?php echo $type; ?></td>
									<td class="text-center">
										<a href="#" id="edit_user" data-id="<?php echo $id_user; ?>"><i
												class="fa fa-edit" style="color:#10922B"></i>
										</a>
									</td>
									<?php
									endforeach;
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
